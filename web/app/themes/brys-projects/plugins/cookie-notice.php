<?php
// File Security Check
if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('You do not have sufficient permissions to access this page');
}

// Plugin enqueues
add_action( 'wp_enqueue_scripts', 'cookie_notice_scripts' );
function cookie_notice_scripts() {
	wp_dequeue_style('cookie-notice-front');
}

add_filter('cn_cookie_notice_args', 'custom_cn_cookie_notice_args');
function custom_cn_cookie_notice_args($args) {
	$cookie_policy_page = get_post(apply_filters( 'wpml_object_id', 174, 'page' ));

	if(apply_filters( 'wpml_current_language', NULL ) == 'nl') {
		$args['message_text'] = 'Wij gebruiken cookies. Door verder te surfen of door deze banner te sluiten gaat u akkoord met onze [cookies_policy_link].';
		$args['accept_text'] = 'Aanvaard cookies';
	} else {
		$args['message_text'] = 'We use cookies. By continuing to browse or closing this banner you agree to our [cookies_policy_link]';
		$args['accept_text'] = 'Accept cookies';
	}

	return $args;

}
