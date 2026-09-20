<?php
// File Security Check
if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('You do not have sufficient permissions to access this page');
}

// Disabling Automatic Scrolling On Form Confirmations
//add_filter('gform_confirmation_anchor', '__return_false');

// Dequeue styling
//add_action( 'gform_enqueue_scripts', 'dequeue_gf_stylesheets', 11 );
function dequeue_gf_stylesheets() {
	wp_dequeue_style( 'gforms_reset_css' );
	wp_dequeue_style( 'gforms_datepicker_css' );
	wp_dequeue_style( 'dashicons' );
	wp_dequeue_style( 'gforms_formsmain_css' );
	wp_dequeue_style( 'gforms_ready_class_css' );
	wp_dequeue_style( 'gforms_browsers_css' );
	wp_dequeue_style( 'gforms_rtl_css' );
	wp_dequeue_style( 'gform_theme_ie11' );
	wp_dequeue_style( 'gform_basic' );
	wp_dequeue_style( 'gform_theme' );
}

//add_filter( 'gform_field_css_class', 'custom_class', 10, 3 );
function custom_class( $classes, $field, $form ) {
	$classes .= ' gfield_' . $field->type;
	return $classes;
}

//add_filter( 'gform_ajax_spinner_url', 'gform_custom_spinner_url', 10, 2 );
function gform_custom_spinner_url( $image_src, $form ) {
	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}

//add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
	if (is_admin()) return $button;
	return '<div class="form_submit">' . str_replace('gform_button', 'gform_button btn_rounded btn--primary', $button) . '</div>';
}

//add_filter( 'gform_field_content', 'project_gform_field_content', 10, 2 );
function project_gform_field_content( $field_content, $field ) {

	// Change textarea rows to 2 instead of 10
	if ( $field->type == 'textarea' ) {
		$field_content = str_replace( "rows='10'", "rows='5'", $field_content );
	}

	if ( $field->type == 'select' ) {
		$field_content = str_replace( 'ginput_container', 'ginput_container field-select', $field_content );
	}

	if ( $field->isRequired ) {
		$field_content = str_replace( '<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span>', '', $field_content );
	} else {
		$field_content = str_replace( '</label>', '<span class="gfield_optional">(Optional)</span></label>', $field_content );
	}

	return $field_content;
}

// Append
//add_filter( 'gform_notification', 'my_gform_notification_signature', 10, 3 );
function my_gform_notification_signature( $notification, $form, $entry ) {
	// append a signature to the existing notification
	$notification['message'] .= __('This message is sent from ', 'reditus-backend') . home_url();

	return $notification;
}

// Allow editors to access Gravity Forms
//add_action( 'admin_init', 'theme_gravity_forms_roles' );
function theme_gravity_forms_roles() {
	$role = get_role( 'editor' );
	$role->add_cap( 'gform_full_access' );
}
