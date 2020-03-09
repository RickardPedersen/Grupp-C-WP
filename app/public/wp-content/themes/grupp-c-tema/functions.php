<?php
/**
 * Description.
 *
 * @package WordPress
 */

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/**
 * Enqueue
 */
function my_theme_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array(), '1.0.0' );
	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);
}


add_action( 'widgets_init', 'child_register_sidebar' );

/**
 * Register sidebar
 */
function child_register_sidebar() {
	register_sidebar(
		array(
			'name'          => 'Sidebar 2',
			'id'            => 'sidebar-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);
}

/**
 * Meks
 */
function meks_which_template_is_loaded() {
	if ( is_super_admin() ) {
		global $template;
		//print_r( $template );
	}
}

add_theme_support( 'post-thumbnails' );

add_action( 'wp_footer', 'meks_which_template_is_loaded' );

/**
 * Query post type.
 */
function query_post_type( $query ) {
	if ( $query->get( 'post_type' ) === 'nav_menu_item' ) {
		return $query;
	}
	if ( ( is_search() || is_home() || is_category() || is_tag() ) && ! is_admin() ) {
		$query->set( 'post_type', 'sales_object' );
		return $query;
	}
}
add_filter( 'pre_get_posts', 'query_post_type' );

add_action( 'pre_get_posts', 'change_ppp_search' );
function change_ppp_search( $query ) {
  if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
    $query->set( 'posts_per_page', 100 );
  }
}
