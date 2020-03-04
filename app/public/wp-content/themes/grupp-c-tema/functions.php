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

function child_register_sidebar(){
	register_sidebar(array(
		'name' => 'Sidebar 2',
		'id' => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
}
