<?php
// File Security Check
if(!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('You do not have sufficient permissions to access this page');
}

/*-----------------------------------------------------------------------------------*/
/* Register Custom Taxonomy
/*-----------------------------------------------------------------------------------*/
add_action('init', 'register_cpt_taxonomy', 0);
function register_cpt_taxonomy() {

	// NL
	// $labels = array(
	//     'name' => __('Categories', 'project-backend'),
	//     'singular_name'     => __('Event category', 'project-backend'),
	//     'search_items' => __('Categories zoeken', 'project-backend'),
	//     'all_items' => __('Alle Categories', 'project-backend'),
	//     'parent_item' => __('Hoofd Category', 'project-backend'),
	//     'parent_item_colon' =>__('Hoofd Category:', 'project-backend'),
	//     'edit_item' => __('Category aanpassen', 'project-backend'),
	//     'update_item' => __('Category wijzigen', 'project-backend'),
	//     'add_new_item' => __('Category toevoegen', 'project-backend'),
	//     'new_item_name' => __('Category naam', 'project-backend'),
	//     'menu_name' => __('Categories', 'project-backend')
	// );

	// EN
	$labels = array(
		'name'              => __('Categories', 'project-backend'),
		'singular_name'     => __('Event category', 'project-backend'),
		'search_items'      => __('Search categories', 'project-backend'),
		'all_items'         => __('All categories', 'project-backend'),
		'parent_item'       => __('Parent category', 'project-backend'),
		'parent_item_colon' => __('Parent category:', 'project-backend'),
		'edit_item'         => __('Edit category', 'project-backend'),
		'update_item'       => __('Update category', 'project-backend'),
		'add_new_item'      => __('Add category', 'project-backend'),
		'new_item_name'     => __('Category name', 'project-backend'),
		'menu_name'         => __('Categories', 'project-backend')
	);


	register_taxonomy(
		'event_categories',
		array('event'),
		array(
			'public'             => false,
			'hierarchical'       => true,
			'labels'             => $labels,
			'query_var'          => true,
			'show_ui'            => true,
			'show_in_quick_edit' => false,
			'meta_box_cb'        => false,
		)
	);
}


// Completely disable term archives for this taxonomy.
add_action('pre_get_posts', function ($qry) {
	if(is_admin()) return;
	if(is_tax('project_locations')) {
		$qry->set_404();
	}
}
);

// Hide slug and description field
add_action('admin_head', 'my_column_width');
function my_column_width() {
	global $pagenow, $typenow, $taxnow;
	if($taxnow !== 'promotion_group') return;
	echo '<style type="text/css">';
	echo '.term-slug-wrap { display: none; }';
	echo '.term-description-wrap{display:none;}';
	echo '</style>';
}

// Add custom table headers
add_filter("manage_edit-promotion_group_columns", 'promotion_group_table_headers');
function promotion_group_table_headers($theme_columns) {
	$new_columns = array(
		'cb'         => '<input type="checkbox" />',
		'name'       => __('Name', 'project-backend'),
		'date_start' => __('Van', 'project-backend'),
		'date_end'   => __('Tot', 'project-backend'),
		'posts'      => __('Promoties', 'project-backend'),
	);
	return $new_columns;
}

// Fill custom columns
add_filter("manage_promotion_group_custom_column", 'manage_promotion_group_columns', 10, 3);
function manage_promotion_group_columns($out, $column_name, $term_id) {
	$term = get_term_by('id', $term_id, 'promotion_group');
	switch ($column_name) {
		case 'date_start':
			$date_string = get_field('promotion_group_start', $term);
			$date = DateTime::createFromFormat('d/m/Y', $date_string);
			$out .= $date->format('j/n');
			break;

		case 'date_end':
			$date_string = get_field('promotion_group_end', $term);
			$date = DateTime::createFromFormat('d/m/Y', $date_string);
			$out .= $date->format('j/n');
			break;

		default:
			break;
	}
	return $out;
}
