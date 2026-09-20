<?php
/*
 * https://developer.wordpress.org/reference/hooks/site_status_tests/
 */
add_filter('site_status_tests', function($tests) {

	unset($tests['direct']['plugin_theme_auto_updates']);
	unset($tests['direct']['cookie_compliance_status']);
	unset($tests['async']['background_updates']);
	unset($tests['async']['authorization_header']);
	unset($tests['async']['page_cache']);

	if(WP_DEBUG && WP_DEBUG == true){

		unset($tests['direct']['wordpress_version']);
		unset($tests['direct']['plugin_version']);
		unset($tests['direct']['theme_version']);
		unset($tests['direct']['php_version']);
		unset($tests['direct']['php_extensions']);
		unset($tests['direct']['php_default_timezone']);
		unset($tests['direct']['php_sessions']);
		unset($tests['direct']['sql_server']);
		unset($tests['direct']['utf8mb4_support']);
		unset($tests['direct']['utf8mb4_support']);
		unset($tests['direct']['ssl_support']);
		unset($tests['direct']['scheduled_events']);
		unset($tests['direct']['http_requests']);
		unset($tests['direct']['rest_availability']);
		unset($tests['direct']['debug_enabled']);
		unset($tests['direct']['file_uploads']);
		unset($tests['direct']['persistent_object_cache']);

		unset($tests['async']['dotorg_communication']);
		unset($tests['async']['loopback_requests']);
		unset($tests['async']['https_status']);

	}

	return $tests;

});
