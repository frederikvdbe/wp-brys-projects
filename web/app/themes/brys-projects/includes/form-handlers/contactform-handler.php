<?php

include_once(get_template_directory().'/includes/WP_Mail.php');

// add_action( 'phpmailer_init', 'phpmailer_init' );
// function phpmailer_init( PHPMailer $phpmailer ) {
//     $phpmailer->Host = 'smtp.gmail.com';
//     $phpmailer->Port = 587; // could be different
//     $phpmailer->Username = 'wijzijnkarakters@gmail.com'; // if required
//     $phpmailer->Password = GMAIL_PW; // if required
//     $phpmailer->SMTPAuth = true; // if required
//     $phpmailer->IsSMTP();
// }

function handle_contact_form() {

    $response = array();

    // Verify nonce
    if( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce($_POST['_wpnonce'], 'contact_form_nonce')) {
        $response['status'] = 'error';
        $response['message'] = 'Nonce error';
        echo json_encode($response);
        die();
    }

    if(!(is_array($_POST) && is_array($_FILES) && defined('DOING_AJAX') && DOING_AJAX)){
        $response['status'] = 'error';
        $response['message'] = 'Ajax error';
        echo json_encode($response);
        die();
    }

    if(!function_exists('wp_handle_upload')){
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    $fname = sanitize_text_field($_POST['fname']);
    $lname = sanitize_text_field($_POST['lname']);
    $country = sanitize_text_field($_POST['country']);
    $phone = sanitize_text_field($_POST['phone']);
    $email = sanitize_text_field($_POST['my_email']);
    $message = $_POST['message'];

    if(sizeof($_FILES) > 0){
        add_filter( 'upload_dir', 'wpse_141088_upload_dir' ); 
        $file_info = wp_handle_upload($_FILES['file'], array(
            'test_form' => false,
            'mimes' => array(
                'csv' => 'text/csv',
                'doc' => 'application/msword',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'gif' => 'image/gif',
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'pdf' => 'application/pdf',
                'ppt' => 'application/vnd.ms-powerpoint',
                'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                'xls' => 'application/vnd.ms-excel',
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            )
        ));
        if(!$file_info || array_key_exists('error', $file_info)){
            $response['status'] = 'error';
            $response['message'] = $file_info['error'];
            echo json_encode($response);
            die();
        }
        remove_filter( 'upload_dir', 'wpse_141088_upload_dir' );
    } 

    $email = (new WP_Mail)
        ->to([
          'info@eliagrid-int.com'
        ])
        ->subject('New contact from enquiry')
        ->template(get_template_directory() .'/includes/emails/contact.html', [
            'fname' => $fname,
            'lname' => $lname,
            'country' => $country,
            'phone' => $phone,
            'email' => $email,
            'message' => implode( "<br>", array_map( 'sanitize_text_field', explode( "\n", $_POST['message'] ) ))
        ]);

    if($file_info){
        $email->attach($file_info['file']);
    }

    $email->send();

    if($email){
        $response['status'] = 'success';        
    } else {
        $response['status'] = 'error';
    }

    echo json_encode($response);
    die();

}
add_action( 'wp_ajax_nopriv_contact_form', 'handle_contact_form' );
add_action( 'wp_ajax_contact_form', 'handle_contact_form' );

function wpse_141088_upload_dir( $dir ) {
    return array(
        'path'   => $dir['basedir'] . '/contactform_attachments',
        'url'    => $dir['baseurl'] . '/contactform_attachments',
        'subdir' => '/contactform_attachments',
    ) + $dir;
}