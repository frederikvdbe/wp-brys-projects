<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}

// Remove WPML css
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

/* ---------------------------------------------------------------------------
 * Set hreflang="x-default" with WPML
 * --------------------------------------------------------------------------- */
add_filter('wpml_alternate_hreflang', 'wps_head_hreflang_xdefault', 10, 2);
function wps_head_hreflang_xdefault($url, $lang_code) {
    if($lang_code == apply_filters('wpml_default_language', NULL ))
        echo '<link rel="alternate" href="' . $url . '" hreflang="x-default" />'.PHP_EOL;
    return $url;
}

// Remove meta box on each post type
function remove_wpml_meta_box() {
	$types = get_post_types();
    remove_meta_box('icl_div', array_values($types), 'side');
    remove_meta_box( 'icl_div_config', array_values($types), 'normal' );
}
//add_action( 'admin_head', 'remove_wpml_meta_box', 11 );

// Languages nav
function languages_nav(){
	$languages = apply_filters( 'wpml_active_languages', null, ['skip_missing' => 0] );
    if(!empty($languages)){
        $return = '<li class="menu-item menu-item-lang_nav menu-item-has-children">';
        $return .= '<span class="lang-current">'. ICL_LANGUAGE_CODE .'</span>';
        $return .= '<ul class="sub-menu lang-dropdown">';
        foreach($languages as $l){
        	if($l['active']) continue;
            $return .= '<li>';
	           	$return .= '<a href="'.$l['url'].'">';
	            	$return .= $l['code'];
	            $return .= '</a>';
            $return .= '</li>';
        }
        return $return .= '</ul></li>';
    }
}

// Add languages nav to primary navigation
add_filter('wp_nav_menu_items', 'add_language_nav', 10, 2);
function add_language_nav ($items, $args) {
	if ($args->theme_location == 'header-nav') {
		$items .= languages_nav();
	}
	return $items;
}

// Capabilities
add_action( 'admin_init', 'custom_wpml_capabilities' );
function custom_wpml_capabilities() {

	// get the the role object
	$editor = get_role( 'editor' );

	// WPML
	//	$editor->add_cap('wpml_manage_translation_management');
	//	$editor->add_cap('wpml_manage_languages');
	//	$editor->add_cap('wpml_manage_theme_and_plugin_localization');
	//	$editor->add_cap('wpml_manage_support');
	//	$editor->add_cap('wpml_manage_media_translation');
	//	$editor->add_cap('wpml_manage_navigation');
	//	$editor->add_cap('wpml_manage_sticky_links');
	$editor->add_cap( 'wpml_manage_string_translation' );
	//	$editor->add_cap('wpml_manage_translation_analytics');
	//	$editor->add_cap('wpml_manage_wp_menus_sync');
	//	$editor->add_cap('wpml_manage_taxonomy_translation');
	//	$editor->add_cap('wpml_manage_troubleshooting');
	//	$editor->add_cap('wpml_manage_translation_options');
}
