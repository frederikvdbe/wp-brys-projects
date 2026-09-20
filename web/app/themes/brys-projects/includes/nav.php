<?php
// File Security Check
if( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page' );
}

/*-----------------------------------------------------------------------------------*/
/* Nav Menus */
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'register_menus' );
function register_menus() {
	register_nav_menus(
		array(
			'header-nav' => __( 'Header Navigation', 'project-backend' ),
			'footer-nav' => __( 'Footer Navigation', 'project-backend' ),
		)
	);
}

/*-----------------------------------------------------------------------------------*/
/* Custom Current Menu Conditions */
/*-----------------------------------------------------------------------------------*/
add_filter( 'nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3 );
function clear_nav_menu_item_id( $id, $item, $args ) {
	return "";
}

function remove_parent_classes( $class ) {
	return $class == 'menu-item' || $class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor' || $class == 'current-menu-item';
}

add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 3 );
function special_nav_class( $classes, $item, $args ) {

	$classes = array_filter( $classes, "remove_parent_classes" );

	if( 'header-nav' == $args->theme_location ) {

		$classes[] = 'c-site-header__menu-item';

		if( is_singular( 'post' ) || is_archive( 'post' ) ) {
			if( $item->ID == 31 ) {
				$classes[] = 'current-menu-item';
			}
		}
	}

	return $classes;
}

/*-----------------------------------------------------------------------------------*/
/* Add custom menu items */
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_nav_menu_items', 'add_static_menu_items', 10, 2 );
function add_static_menu_items( $items, $args ) {
	if( $args->theme_location == 'header-nav' ) {
		$items .= '<li class="c-site-header__menu-item"><a class="c-site-header__menu-link c-button c-button--primary" href="/styleguide">Styleguide</a></li>';
	}

	return $items;
}

add_filter( 'nav_menu_link_attributes', 'site_link_atts', 10, 3);
function site_link_atts($atts, $menu_item, $args) {

	if( $args->theme_location == 'header-nav' ) {
		$atts['class'] = 'c-site-header__menu-link';
	}

	return $atts;
}

/*-----------------------------------------------------------------------------------*/

/* Create nav walker
/*-----------------------------------------------------------------------------------*/

class Custom_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$classes = array();
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$output .= "<ul$class_names>";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

		if( in_array( 'current-menu-item', $classes ) )
			$item->classes = array( 'active' );

		if( $args->walker->has_children )
			$item->classes[] = 'has-dropdown';

		if( 'Initiatieven' == $item->title ||
			'Initiativen' == $item->title ||
			'Initiatives' == $item->title ) {
			$item->classes[] = 'has-dropdown';
		}

		if( $depth == 0 ) {
			$item->classes[] = 'nav-item';
			$nav_class = 'nav-link';
		} else {
			$item->classes = array();
			$nav_class = '';
		}

		$output .= '<li class="' . implode( " ", $item->classes ) . '">';
		$output .= '<a href="' . $item->url . '" class="' . $nav_class . '">';
		$output .= $item->title;
		$output .= '</a>';
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {

		if( 'Initiatieven' == $item->title ||
			'Initiativen' == $item->title ||
			'Initiatives' == $item->title ) {

			$initiatives = get_posts( array(
				'post_type' => 'initiative',
				'posts_per_page' => - 1,
				'suppress_filters' => 0,
				'orderby' => 'menu_order',
				'order' => 'ASC'
			) );

			$output .= '<ul>';

			foreach( $initiatives as $initiative ) {
				$output .= '<li><a href="' . get_permalink( $initiative->ID ) . '">' . $initiative->post_title . '</a></li>';
			}

			$output .= '</ul>';
		}

		$output .= "</li>\n";
	}

}
