<?php

/**
 * Enqueue styles and scripts.
 */
function tna_styles() {

	wp_register_style( 'tna-styles', get_stylesheet_directory_uri() . '/css/base-sass.css', array(), '0.1', 'all' );
	wp_register_style( 'tna-google-fonts',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic|Bitter', '', '', 'all' );

	wp_enqueue_style( 'tna-styles' );
	wp_enqueue_style( 'tna-google-fonts' );

}
add_action( 'wp_enqueue_scripts', 'tna_styles' );

function tna_scripts() {

	wp_register_script( 'global-jquery', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), '1.11.3' );
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6', true );
	wp_register_script( 'tna-global', get_template_directory_uri() . '/js/tna-global.js', array(), true );


	wp_enqueue_script( 'global-jquery' );
	wp_enqueue_script( 'tna-global' );
	wp_enqueue_script( 'bootstrap-js' );

}
add_action( 'wp_enqueue_scripts', 'tna_scripts' );



// Remove the emoji from the head section
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove wordpress generator meta from head
remove_action( 'wp_head', 'wp_generator' );

// Includes
include 'inc/functions/dimox_breadcrumbs.php';

?>