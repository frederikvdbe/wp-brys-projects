<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}

add_filter( 'template_include', 'cpt_overview_template' );
function cpt_overview_template( $template ) {
    global $post;

    if( $post->ID == 9 )
        if ( file_exists( get_template_directory() . '/includes/cpt/index.php' ) )
            return get_template_directory() . '/includes/cpt/index.php';

    return $template;
}

add_filter('single_template', 'cpt_single_template');
function cpt_single_template($template) {
    global $post;

    if ( $post->post_type == 'cpt' )
        if ( file_exists( get_template_directory() . '/includes/cpts/single.php' ) )
            return get_template_directory() . '/includes/cpts/single.php';

    return $template;
}

add_filter('taxonomy_template', 'cpt_category_template');
function cpt_category_template($template) {
    global $post;

    if ( is_tax( 'cpt_categories') )
        if ( file_exists( get_template_directory() . '/includes/cpts/category-cpt.php' ) )
            return get_template_directory() . '/includes/cpts/category-cpt.php';

    return $template;
}

function get_cpts($args = array()){

    $defaults = array(
        'post_type' => 'cpt',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'posts_per_page' => get_option( 'posts_per_page' )
    );

    $args = wp_parse_args($args,$defaults);

    return get_posts($args);
}
