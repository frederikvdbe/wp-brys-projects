<?php
// File Security Check
if(!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('You do not have sufficient permissions to access this page');
}

// TODO: https://support.advancedcustomfields.com/forums/topic/making-acf-data-available-to-wp_search/

// Template redirect
add_filter('template_include', 'search_template_redirect');
function search_template_redirect($template) {

	if(is_search())
		if(file_exists(get_template_directory() . '/page-templates/search.php'))
			return get_template_directory() . '/page-templates/search.php';

	return $template;
}

// Set post types for search
function searchfilter($query) {

	if($query->is_search) {

		$query->set('post_type', array(
			'story',
			'project'
		));

	}

	return $query;
}

//add_filter('pre_get_posts', 'searchfilter');


// Highlight Searched Words
function highlight_results($text) {
	if(is_search() && !is_admin()) {
		$keys = implode('|', explode(' ', get_search_query()));
		$text = preg_replace('/(' . $keys . ')/iu', '<span class="search-highlight">\0</span>', $text);
	}
	return $text;
}

add_filter('the_content', 'highlight_results');
add_filter('the_excerpt', 'highlight_results');
add_filter('the_title', 'highlight_results');
