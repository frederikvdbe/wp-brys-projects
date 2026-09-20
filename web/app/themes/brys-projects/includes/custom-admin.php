<?php
// File Security Check
if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('You do not have sufficient permissions to access this page');
}

$custom_admin_master_user_id = 1;

// Allow svg uploads
/* Reminder; add <?xml version="1.0" encoding="utf-8"?> to svg files */
//add_action('upload_mimes', 'add_file_types_to_uploads', 10, 1 );
function add_file_types_to_uploads($mimes){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

// Selectively Hide WP Admin Menus
//add_action('admin_menu', 'custom_admin_remove_admin_menus');
function custom_admin_remove_admin_menus(){
	global $current_user;
	global $custom_admin_master_user_id;

	if ($current_user->ID != $custom_admin_master_user_id) {

		// Remove menu pages
		remove_menu_page('edit.php');
		remove_menu_page('plugins.php');
		remove_menu_page('options-general.php');
		remove_menu_page('tools.php');
		remove_menu_page('edit.php?post_type=acf-field-group');
		remove_menu_page('edit-comments.php');
		remove_menu_page('themes.php');
		remove_submenu_page('themes.php', 'themes.php');
		remove_submenu_page('themes.php', 'customize.php');
		remove_submenu_page('themes.php', 'theme-editor.php');

		// Remove Plugin Update Nag
		remove_action('load-update-core.php', 'wp_update_plugins');
		add_filter('pre_site_transient_update_plugins', '__return_false');

	}

}


// Selectively Hide WP Admin Bar Menu Items
//add_action('admin_bar_menu', 'custom_admin_remove_wp_nodes', 999);
function custom_admin_remove_wp_nodes(){
	global $wp_admin_bar;
	global $current_user;
	global $custom_admin_master_user_id;

	$wp_admin_bar->remove_menu('comments');

	if ($current_user->ID != $custom_admin_master_user_id) {
		$wp_admin_bar->remove_node('new-link');
	}
}


// Posts -> News
//add_action('admin_menu', 'custom_admin_change_post_label');
//add_action('init', 'custom_admin_change_post_object');
function custom_admin_change_post_label(){
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = __('News', 'project-backend');
	$submenu['edit.php'][10][0] = __('Add News', 'project-backend');
	$submenu['edit.php'][16][0] = __('News Tags', 'project-backend');
}

function custom_admin_change_post_object(){
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = __('News', 'project-backend');
	$labels->singular_name = __('News', 'project-backend');
	$labels->add_new = __('Add News', 'project-backend');
	$labels->add_new_item = __('Add News', 'project-backend');
	$labels->edit_item = __('Edit News', 'project-backend');
	$labels->new_item = __('News', 'project-backend');
	$labels->view_item = __('View News', 'project-backend');
	$labels->search_items = __('Search News', 'project-backend');
	$labels->not_found = __('No News found', 'project-backend');
	$labels->not_found_in_trash = __('No News found in Trash', 'project-backend');
	$labels->all_items = __('All News', 'project-backend');
	$labels->menu_name = __('News', 'project-backend');
	$labels->name_admin_bar = __('News', 'project-backend');
}


// Remove WP Update nag
//add_action('admin_menu', 'custom_admin_hide_nag');
function custom_admin_hide_nag(){
	global $current_user;
	global $custom_admin_master_user_id;

	if ($current_user->ID != $custom_admin_master_user_id) {
		remove_action('admin_notices', 'update_nag', 3);
	}
}

// Hide super admin is user list
//add_action('pre_user_query', 'custom_admin_pre_user_query');
function custom_admin_pre_user_query($user_search){
	global $custom_admin_master_user_id;

	$user = wp_get_current_user();

	if ($user->ID != $custom_admin_master_user_id) {
		global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1',
			"WHERE 1=1 AND {$wpdb->users}.ID<>".$custom_admin_master_user_id, $user_search->query_where);
	}
}

// WYSIWYG - Limit brand colors
//add_filter('tiny_mce_before_init', 'custom_admin_mce4_options');
function custom_admin_mce4_options($init){

	$custom_colours = '
        "ffcc32", "Primary color",
        "70dcec", "Light brand color",
        "fff559", "Secondary brand color",
        "fffab0", "Light secondary brand color",
    ';

	// build colour grid default+custom colors
	$init['textcolor_map'] = '[' . $custom_colours . ']';

	$init['textcolor_rows'] = 1;
	$init['textcolor_cols'] = 4;

	return $init;
}

// Custom capabilities
//add_action('admin_init', 'custom_admin_capabilities');
function custom_admin_capabilities() {

	// get the the role object
	$editor = get_role( 'editor' );

	// Add cap for editing menus
	$editor->add_cap( 'edit_theme_options' );

	// Add cap for editing privacy pages
	$editor->add_cap( 'manage_privacy_options' );

}

//add_action('map_meta_cap', 'custom_manage_privacy_options', 1, 4);
function custom_manage_privacy_options($caps, $cap, $user_id, $args) {

	if (!is_user_logged_in()) return $caps;

	// Add appropriate caps to editor for
	$user_meta = get_userdata($user_id);
	if (array_intersect(['editor', 'administrator'], $user_meta->roles)) {
		if ('manage_privacy_options' === $cap) {
			$manage_name = is_multisite() ? 'manage_network' : 'manage_options';
			$caps = array_diff($caps, [ $manage_name ]);
		}
	}

	return $caps;
}

// Whitelableling
//add_action('admin_menu', 'custom_admin_new_nav_menu');
function custom_admin_new_nav_menu(){
	global $menu;
	global $current_user;
	global $custom_admin_master_user_id;

	if ($current_user->ID != $custom_admin_master_user_id) {
		add_menu_page('Nav Menu', 'Menu', 'edit_posts', 'nav-menus.php', '', 'dashicons-menu', 24);
	}
}

//add_action('wp_before_admin_bar_render', 'custom_admin_admin_bar_remove', 0);
function custom_admin_admin_bar_remove(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('comments');
}

add_action( 'admin_bar_menu', 'custom_admin_remove_wp_logo', 999 );
function custom_admin_remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'customize' );
	$wp_admin_bar->remove_node( 'new' );
}

add_filter( 'admin_footer_text', 'custom_admin_footer' );
function custom_admin_footer(){
	echo '';
}

//add_action('login_head', 'custom_admin_login_styles');
function custom_admin_login_styles() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/assets/build/css/admin/login.css" />';
	echo '<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" />';
}

//add_action( 'admin_enqueue_scripts', 'custom_admin_add_google_font' );
function custom_admin_add_google_font() {
	wp_enqueue_style( 'my-google-font', '//fonts.googleapis.com/css?family=Source+Sans+Pro' );
}

//add_action( 'admin_init', 'custom_admin_theme' );
function custom_admin_theme() {
	wp_admin_css_color(
		'project', ucfirst('project-backend'),
		get_template_directory_uri() . '/assets/build/css/admin/main.css',
		array( '#004d66', '#CC006D', '#00BFFF', '#0099CC' )
	);
}

//add_filter( 'get_user_option_admin_color', 'custom_admin_update_user_option_admin_color', 5 );
function custom_admin_update_user_option_admin_color( $color_scheme ) {
	$color_scheme = 'project';
	return $color_scheme;
}


/*-----------------------------------------------------------------------------------*/
/* Empty dashboard */
/*-----------------------------------------------------------------------------------*/
add_action('wp_dashboard_setup', 'custom_admin_remove_dashboard_widgets');
function custom_admin_remove_dashboard_widgets(){
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

// Hide ACF edit buttons for non-admins
add_action('admin_head', 'custom_admin_hide_acf_cog_icons');
function custom_admin_hide_acf_cog_icons(){
	global $current_user;
	global $custom_admin_master_user_id;

	if ($current_user->ID != $custom_admin_master_user_id) {

		echo '<style>
            .acf-hndle-cog,
            .acf-handle-cog{
                display: none !important;
            }
        </style>';

	}
}

/*-----------------------------------------------------------------------------------*/
/* Admin menu structure */
/*-----------------------------------------------------------------------------------*/
// add_action('admin_menu', 'custom_admin_menu_items', 50);
function custom_admin_menu_items(){
	global $menu;
	foreach ($menu as $key => $value) {
		if ('upload.php' == $value[2]) {
			$oldkey = $key;
		}
	}
	$newkey = 22;
	$menu[$newkey] = $menu[$oldkey];
	unset($menu[$oldkey]);
}

function add_admin_menu_separator($position){
	global $menu;
	$index = 0;
	foreach ($menu as $offset => $section) {
		if (substr($section[2], 0, 9) == 'separator')
			$index++;
		if ($offset >= $position) {
			$menu[$position] = array('', 'read', "separator{$index}", '', 'wp-menu-separator');
			break;
		}
	}
	ksort($menu);
}

// add_action('admin_menu','custom_admin_menu_separator', 99);
function custom_admin_menu_separator(){
	add_admin_menu_separator(21);
}

// add_action('admin_init','dump_admin_menu', 999);
function dump_admin_menu(){
	if (is_admin()) {
		header('Content-Type:text/plain');
		var_dump($GLOBALS['menu']);
		exit;
	}
}


/*-----------------------------------------------------------------------------------*/
/* Disable support for comments and trackbacks in post types */
/*-----------------------------------------------------------------------------------*/
add_filter('comments_open', 'custom_admin_disable_comments_status', 20, 2);
add_filter('pings_open', 'custom_admin_disable_comments_status', 20, 2);
function custom_admin_disable_comments_status(){
	return false;
}

add_filter('comments_array', 'custom_admin_disable_comments_hide_existing_comments', 10, 2);
function custom_admin_disable_comments_hide_existing_comments($comments){
	$comments = array();
	return $comments;
}

add_action('admin_menu', 'custom_admin_disable_comments_admin_menu');
function custom_admin_disable_comments_admin_menu(){
	remove_menu_page('edit-comments.php');
}

// Redirect any user trying to access comments page
add_action('admin_init', 'custom_admin_disable_comments_admin_menu_redirect');
function custom_admin_disable_comments_admin_menu_redirect(){
	global $pagenow;

	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url());
		exit;
	}
}

// Remove comments metabox from dashboard
add_action('admin_init', 'custom_admin_disable_comments_dashboard');
function custom_admin_disable_comments_dashboard(){
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}

// Remove comments links from admin bar
add_action('init', 'custom_admin_disable_comments_admin_bar');
function custom_admin_disable_comments_admin_bar(){
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}

// Disable support for comments and trackbacks in post types
add_action('admin_init', function () {
	foreach (get_post_types() as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
});

// Remove comments page in menu
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});
