<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}

/*-----------------------------------------------------------------------------------*/
/* Register CPT
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'custom_post_type_events' );
function custom_post_type_events() {

	$labels = generate_post_type_labels('Cpt', 'Cpts', array(
		'name' => 'Cpts', // Menu name
		'singular_name' => 'Cpt' // ACF display
	));

	$supports = array(
		'title',
		'editor',
		'thumbnail',
        // 'revisions'
	);

	register_post_type( 'event',
		array(
			'labels' => $labels,
			'public' => true,
			'menu_position' => 5,
			'hierarchical' => false,
			'publicly_queryable'  => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-calendar',
			'supports' => $supports,
			'capability_type' => 'post'
		)
	);

}

/*
	MENU POSITION HELPER GUIDE
	--------------------------
    5 	below Posts
    10 	below Media
    15	below Links
    20	below Pages
    25	below comments
    60	below first separator
    65	below Plugins
    70	below Users
    75	below Tools
    80	below Settings
    100	below second separator
*/


// Add custom table headers
// add_filter('manage_city_posts_columns', 'cities_table_headers');
// function cities_table_headers( $defaults ) {

//     // Columns to add
//     $defaults['admins'] = 'Admins';
//     $defaults['active'] = 'Active';

//     // Preferred order
//     $order = array('cb', 'active', 'title', 'admins', 'date');

//     // Order them
//     foreach($order as $colname){
//         $new[$colname] = $defaults[$colname];
//     }
//     return $new;
// }

// add_action('admin_head', 'cities_table_styling');
// function cities_table_styling() {
//     global $pagenow, $typenow, $taxnow ;
// 	if($taxnow !== 'tax_name') return;
//     echo '<style type="text/css">';
//     echo '.column-active { text-align: center; width:50px !important; overflow:hidden }';
//     echo '.column-active::before { color: #000 !important; }';
//     echo '</style>';
// }

// // Fill custom columns
// add_action( 'manage_city_posts_custom_column', 'cities_table_content', 10, 2 );
// function cities_table_content( $column_name, $post_id ) {
//     if ($column_name == 'admins') {
//         $users = get_users(array('meta_key' => 'user_city_allowed', 'meta_value' => $post_id));
//         $counter = 0;
//         $len = count($users);
//         foreach($users as $user){
//             $userdata = get_userdata($user->ID);
//             echo $user->first_name . ' ' . $user->last_name . ($counter == $len-1 && $counter != 0 ? ', ' : '');
//             $counter++;
//         }
//     }

//     if($column_name == 'active'){
//         echo '<div class="dashicons-before dashicons-yes" style="color: #000 !important;"><br></div>';
//     }
// }

// // Order custom column (zie livingstreet?)
// add_filter( 'manage_edit-event_sortable_columns', 'bs_event_table_sorting' );
// function bs_event_table_sorting( $columns ) {
//   $columns['event_date'] = 'event_date';
//   return $columns;
// }

// add_filter( 'request', 'bs_event_date_column_orderby' );
// function bs_event_date_column_orderby( $vars ) {
//     if ( isset( $vars['orderby'] ) && 'event_date' == $vars['orderby'] ) {
//         $vars = array_merge( $vars, array(
//             'meta_key' => '_bs_meta_event_date',
//             'orderby' => 'meta_value'
//         ) );
//     }
//     return $vars;
// }
