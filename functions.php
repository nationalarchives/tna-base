<?php

/**
 * Enqueue styles and scripts.
 */
function tna_styles()
{

    wp_register_style( 'tna-styles', get_stylesheet_directory_uri() . '/css/base-sass.css', '', '', 'all' );
	wp_register_style( 'tna-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic|Bitter', '', '', 'all' );

    wp_enqueue_style( 'tna-styles' );
	wp_enqueue_style( 'tna-google-fonts' );

}
add_action( 'wp_enqueue_scripts', 'tna_styles' );

function tna_scripts()
{

	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js' );

	wp_enqueue_script('bootstrap-js');

}
add_action( 'wp_enqueue_scripts', 'tna_scripts' );

?>