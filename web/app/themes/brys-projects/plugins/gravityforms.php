<?php
// File Security Check
if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('You do not have sufficient permissions to access this page');
}

add_filter( 'gform_disable_css', '__return_true' );

add_filter( 'gform_form_theme_slug', function () {
	return 'gravity-theme';
} );

add_filter( 'gform_confirmation_anchor', '__return_false' );

add_filter( 'gform_ajax_spinner_url', function () {
	return 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
} );

add_filter( 'gform_validation_message', function () {
	return '<h2 class="gform_submission_error">Niet alle velden zijn goed ingevuld. Kijk de velden hieronder na.</h2>';
} );
