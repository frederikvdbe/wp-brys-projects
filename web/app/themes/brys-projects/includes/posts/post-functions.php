<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page' );
}

add_filter( 'template_include', 'post_index_template' );
function post_index_template( $template ) {
	global $post;

	if( $post->ID == 9 )
		if ( file_exists( get_template_directory() . '/includes/posts/index.php' ) )
			return get_template_directory() . '/includes/posts/index.php';

	return $template;
}

add_filter('single_template', 'posts_single_template');
function posts_single_template($template) {
	global $post;

	if ( $post->post_type == 'post' )
		if ( file_exists( get_template_directory() . '/includes/cpts/single.php' ) )
			return get_template_directory() . '/includes/cpts/single.php';

	return $template;
}

add_filter('taxonomy_template', 'post_category_template');
function post_category_template($template) {
	global $post;

	if ( is_tax( 'cpt_categories') )
		if ( file_exists( get_template_directory() . '/includes/cpts/category-cpt.php' ) )
			return get_template_directory() . '/includes/cpts/category-cpt.php';

	return $template;
}

// Rename posts
add_action('admin_menu', 'admin_change_post_label');
function admin_change_post_label(){
	global $menu;
	global $submenu;
	$menu[5][0] = 'Nieuws';
	$submenu['edit.php'][5][0] = __('Nieuws', 'project-backend');
	$submenu['edit.php'][10][0] = __('Nieuws toevoegen', 'project-backend');
	$submenu['edit.php'][16][0] = __('Tags', 'project-backend');
}

add_action('init', 'admin_change_post_object');
function admin_change_post_object(){
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = __('News', 'project-backend');
	$labels->singular_name = __('News', 'project-backend');
	$labels->add_new = __('Add news', 'project-backend');
	$labels->add_new_item = __('Add news', 'project-backend');
	$labels->edit_item = __('Edit news', 'project-backend');
	$labels->new_item = __('News', 'project-backend');
	$labels->view_item = __('View news', 'project-backend');
	$labels->search_items = __('Search news', 'project-backend');
	$labels->not_found = __('No news found', 'project-backend');
	$labels->not_found_in_trash = __('No news found in Trash', 'project-backend');
	$labels->all_items = __('All news', 'project-backend');
	$labels->menu_name = __('News', 'project-backend');
	$labels->name_admin_bar = __('News', 'project-backend');
}

add_action('init', 'remove_post_taxonomies');
function remove_post_taxonomies() {
	register_taxonomy('category', []);
	register_taxonomy('post_tag', []);
}
