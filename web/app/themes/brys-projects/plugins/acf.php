<?php
// File Security Check
if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('You do not have sufficient permissions to access this page');
}

// ACF Google Map API Key
function theme_acf_init () {
	acf_update_setting('google_api_key', $_ENV['GOOGLE_API_KEY']);
}
add_action('acf/init', 'theme_acf_init');

// Add options page
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => __('General settings', 'project-backend'),
		'menu_title' => __('General settings', 'project-backend'),
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}

// Custom toolsbar
//add_filter('acf/fields/wysiwyg/toolbars' , 'custom_mce_toolbars');
function custom_mce_toolbars ($toolbars) {
	$toolbars['Full'] = array();
	$toolbars['Full'][1] = array('bold', 'italic', 'underline', 'bullist', 'numlist', 'alignleft', 'aligncenter', 'alignright', 'alignjustify', 'link', 'unlink', 'hr', 'spellchecker', 'wp_more', 'wp_adv');
	$toolbars['Full'][2] = array('styleselect', 'formatselect', 'fontselect', 'fontsizeselect', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help');

	return $toolbars;
}

// Exclude current post from relationship field
add_filter('acf/fields/relationship/query', 'custom_acf_fields_relationship_query', 10, 3);
function custom_acf_fields_relationship_query ($args, $field, $post_id) {

	// Show 40 posts per AJAX call.
	$args['exclude'] = $post_id;

	return $args;
}
