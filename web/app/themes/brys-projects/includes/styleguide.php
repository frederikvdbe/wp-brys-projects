<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page' );
}

add_filter( 'query_vars', 'styleguide_query_vars' );
function styleguide_query_vars( $qvars ) {
	$qvars[] = 'styleguide';
	return $qvars;
}

add_action('init', 'styleguide_rewrite_rule', 10, 0);
function styleguide_rewrite_rule() {
	add_rewrite_rule('styleguide?$',
		'index.php?styleguide=1',
		'top');
}

add_filter( 'template_include', 'styleguide_template' );
function styleguide_template( $template ) {

	if(WP_ENV != 'development') return $template;

	if( get_query_var('styleguide') && get_query_var('styleguide') == '1' )
		if ( file_exists( get_template_directory() . '/page-templates/styleguide.php' ) )
			return get_template_directory() . '/page-templates/styleguide.php';

	return $template;
}
