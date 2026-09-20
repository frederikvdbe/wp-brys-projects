<?php

/*-----------------------------------------------------------------------------------*/
/* Remove Header Links */
/*-----------------------------------------------------------------------------------*/
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'rest_output_link_wp_head', 10 );
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10 );
add_filter('wp_resource_hints', function ($urls, $relation) {
    if ($relation !== 'dns-prefetch') return $urls;
    return array_filter($urls, function ($url) {
        return strpos($url, 's.w.org') === false;
    });
}, 0, 2);
add_action('wp_print_styles', function (): void {
	wp_dequeue_style('classic-theme-styles');
	wp_dequeue_style('global-styles');
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
});
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');


/*-----------------------------------------------------------------------------------*/
/* Theme Settings */
/*-----------------------------------------------------------------------------------*/
// Disable admin-bar
add_filter('show_admin_bar', '__return_false');

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Post Thumbnail Init
add_theme_support( 'post-thumbnails' );

// Disable responsive images
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );

// Disable Author Pages
remove_filter('template_redirect', 'redirect_canonical');
add_action('template_redirect', 'theme_disable_author_archives');
function theme_disable_author_archives() {
	if (is_author()) {
		global $wp_query;
		$wp_query->set_404();
		status_header(404);
		wp_safe_redirect(get_bloginfo('url'),'301');
	} else {
		redirect_canonical();
	}
}

// Redirect WordPress Logout to Home Page
add_action('wp_logout', function(){
	wp_redirect(home_url());exit();
});


/*-----------------------------------------------------------------------------------*/
/* Mail Settings */
/*-----------------------------------------------------------------------------------*/
add_action( 'phpmailer_init', 'setup_phpmailer_init' );
function setup_phpmailer_init( $phpmailer ) {

	if( defined('WP_ENV') && WP_ENV == 'development'){
	    $phpmailer->Host = 'smtp.mailtrap.io'; // for example, smtp.mailtrap.io
	    $phpmailer->Port = 587; // set the appropriate port: 465, 2525, etc.
	    $phpmailer->Username = '8a0793c8d4800e'; // your SMTP username
	    $phpmailer->Password = '6705d46b8bd82c'; // your SMTP password
	    $phpmailer->SMTPAuth = true;
	    $phpmailer->SMTPSecure = 'tls'; // preferable but optional
	    $phpmailer->IsSMTP();
	}
}


/*-----------------------------------------------------------------------------------*/
/* Project Enqueues */
/*-----------------------------------------------------------------------------------*/
// Script attributes
add_filter( 'script_loader_tag', 'add_attribs_to_scripts', 10, 3 );
function add_attribs_to_scripts( $tag, $handle, $src ) {

	if (
		$handle == 'vite-dev' ||
		$handle == 'main'
	) {
		return '<script type="module" src="' . $src . '"></script>' . "\n";
	}

	return $tag;
}

// Reads the vite manifest so the hashed build files can be enqueued
function get_vite_manifest() {
	static $manifest = null;

	if ( $manifest === null ) {
		$path     = get_template_directory() . '/assets/dist/.vite/manifest.json';
		$manifest = file_exists( $path ) ? json_decode( file_get_contents( $path ), true ) : array();
	}

	return $manifest;
}

// Project enqueues
add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts' );
function custom_enqueue_scripts() {

	$dev = defined( 'WP_DEBUG' ) && WP_DEBUG && ! empty( $_SERVER['DDEV_PRIMARY_URL'] );

	if ( $dev ) {

		// Vite dev server. main.js imports main.scss, so it serves the styles as well.
		// The origin follows the scheme of the site, DDEV_PRIMARY_URL is not always https.
		$origin = untrailingslashit( set_url_scheme( $_SERVER['DDEV_PRIMARY_URL'] ) ) . ':5173';

		wp_enqueue_script( 'vite-dev', $origin . '/@vite/client', false, null, false );
		wp_enqueue_script( 'main', $origin . '/assets/js/main.js', false, null, false );

	} else {

		$manifest = get_vite_manifest();
		$entry    = $manifest['assets/js/main.js'] ?? null;
		$base     = get_template_directory_uri() . '/assets/dist/';

		if ( $entry ) {
			foreach ( $entry['css'] ?? array() as $index => $file ) {
				wp_enqueue_style( 'styles' . ( $index ? '-' . $index : '' ), $base . $file, '', null, 'all' );
			}

			wp_enqueue_script( 'main', $base . $entry['file'], false, null, true );
		}
	}

	// JS data
	wp_localize_script( 'main', 'brys', array(
		'template_dir' => get_template_directory_uri(),
		'ajax_url'     => admin_url( 'admin-ajax.php' ),
	) );

}



/*-----------------------------------------------------------------------------------*/
/* Image Sizes */
/*-----------------------------------------------------------------------------------*/
// update_option('thumbnail_size_w', 360);
// update_option('thumbnail_size_h', 220);
// update_option('thumbnail_crop', 1);
// update_option('medium_size_w', 560);
// update_option('medium_size_h', 320);
// update_option('medium_crop', 1);
// update_option('large_size_w', 680);
// update_option('large_size_h', 410);

// Retina image sizes
//$sizes = array(
//    'recipe-thumb' => [480, 345, true]
//);
//foreach($sizes as $size => $attr) {
//	add_image_size( $size, $attr[0], $attr[1], $attr[2] );
//	add_image_size( $size . '2x', is_int($attr[0]) ? $attr[0]*2 : $attr[0], is_int($attr[1]) ? $attr[1]*2 : $attr[0], $attr[2] );
//}



/*-----------------------------------------------------------------------------------*/
/* Page Pagination */
/*-----------------------------------------------------------------------------------*/
// function custom_pagination($numpages = '', $pagerange = '', $paged='') {

// 	if (empty($pagerange)) {
// 		$pagerange = 2;
// 	}

// 	global $paged;
// 	if (empty($paged)) {
// 		$paged = 1;
// 	}
// 	if ($numpages == '') {
// 		global $wp_query;
// 		$numpages = $wp_query->max_num_pages;
// 		if(!$numpages) {
// 			$numpages = 1;
// 		}
// 	}

// 	$pagination_args = array(
// 		'base'            => get_pagenum_link(1) . '%_%',
// 		'format'          => 'page/%#%',
// 		'total'           => $numpages,
// 		'current'         => $paged,
// 		'show_all'        => False,
// 		'end_size'        => 1,
// 		'mid_size'        => $pagerange,
// 		'prev_next'       => True,
// 		'prev_text'       => __('&laquo;'),
// 		'next_text'       => __('&raquo;'),
// 		'type'            => 'plain',
// 		'add_args'        => false,
// 		'add_fragment'    => ''
// 	);

// 	$paginate_links = paginate_links($pagination_args);

// 	if ($paginate_links) {
// 		echo "<nav class='page-pagination'>";
// 		echo "<span class='page-numbers page-num'>Pagina " . $paged . " van " . $numpages . "</span> ";
// 		echo $paginate_links;
// 		echo "</nav>";
// 	}

// }



/*-----------------------------------------------------------------------------------*/
/* Custom body classes */
/*-----------------------------------------------------------------------------------*/
add_filter('body_class', 'custom_body_classes', 20, 2);
function custom_body_classes($classes, $class) {
    global $post;
	$classes = array();
	$template_slug = get_page_template_slug();
    $queried_object = get_queried_object();

	// Automatic tpl classes
	if($template_slug)
	    $classes[] = 'tpl-' . basename(explode('/', $template_slug)[1], '.php');

	if(is_404())
		$classes[] = 'tpl-404';

	if(is_search())
		$classes[] = 'tpl-search';

	if(is_single())
	    $classes[] = 'sgl-' . $queried_object->post_type;

    if(is_singular('page') && !$template_slug)
        $classes[] = 'sgl-page';

	// Overwrites and special body classes
    if(is_tax('project_categories')){
        $classes[] = 'term-' . $queried_object->slug;
        $classes[] = 'tpl-projects';
    }

    if(is_singular('faq')){
        $classes[] = 'tpl-faq';
    }

	return $classes;
}

/*-----------------------------------------------------------------------------------*/
/* Custom 404 template */
/*-----------------------------------------------------------------------------------*/
add_action('template_include', function($template) {

	if (is_404())
		if ( file_exists( get_template_directory() . '/page-templates/404.php' ) )
			return get_template_directory() . '/page-templates/404.php';

	return $template;

});

/*-----------------------------------------------------------------------------------*/
/* Misc */
/*-----------------------------------------------------------------------------------*/
function wrap_embed_oembed_html($html, $url, $attr) {
	return '<div class="embed-container">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'wrap_embed_oembed_html', 10, 3);


/*-----------------------------------------------------------------------------------*/
/* Includes */
/*-----------------------------------------------------------------------------------*/
require_once('includes/helpers.php');
require_once ('includes/disable-pingback.php');
require_once('includes/nav.php');
//require_once('includes/custom-admin.php');
require_once ('includes/styleguide.php');

//require_once('plugins/wpml.php');
//require_once ('plugins/acf.php');
//require_once ('plugins/gravityforms.php');
//require_once ('plugins/yoast.php');
//require_once ('plugins/sentry.php');
