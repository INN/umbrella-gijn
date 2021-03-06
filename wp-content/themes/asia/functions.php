<?php
// hides the INN logo and feed of member stories
define( 'INN_MEMBER', FALSE );

/**
 * Includes
 */
$includes = array(
	'/inc/open-graph.php',
);
// Perform load
foreach ( $includes as $include ) {
	require_once( get_stylesheet_directory() . $include );
}

function gijn_enqueue() {
	wp_enqueue_style( 'gijn-stylesheet', get_stylesheet_directory_uri().'/style.css' );	//often overridden by custom-less-variables version
}
add_action( 'wp_enqueue_scripts', 'gijn_enqueue', 20 );

// setup the custom follow widget
require_once( get_stylesheet_directory() . '/largo-follow-gijn.php' );
function gijn_widgets() {
	register_widget( 'largo_follow_widget_gijn' );
}
add_action( 'widgets_init', 'gijn_widgets' );

function gijc_register_sidebars() {
	register_sidebar( array(
			'name' 			=> __( 'Sponsors', 'largo' ),
			'desc' 			=> __( 'The sponsors section on the homepage', 'largo' ),
			'id' 			=> 'sponsors',
			'before_widget' => '',
			'after_widget' 	=> '',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>',
		) );
	register_sidebar( array(
			'name' 			=> __( 'Partners', 'largo' ),
			'desc' 			=> __( 'The partners section on the homepage', 'largo' ),
			'id' 			=> 'partners',
			'before_widget' => '',
			'after_widget' 	=> '',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>',
		) );

}
add_action( 'widgets_init', 'gijc_register_sidebars' );
