<?php

// Theme version
define( 'EDD_VERSION', '1.0.3' );

// Enqueue styles and scripts
function tna_styles() {
	wp_register_style( 'tna-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(), EDD_VERSION, 'all' );
	wp_register_style( 'tna-google-fonts',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic|Bitter', '', '', 'all' );
	wp_enqueue_style( 'tna-styles' );
	wp_enqueue_style( 'tna-google-fonts' );
}

add_action( 'wp_enqueue_scripts', 'tna_styles' );

function tna_scripts() {
	wp_register_script( 'global-jquery', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), '1.11.3' );
	wp_register_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(),
		'2.8.3', false );
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6', true );
	wp_register_script( 'tna-global', get_template_directory_uri() . '/js/tna-global.js', array(), EDD_VERSION, true );
	wp_register_script( 'webtrends', get_template_directory_uri() . '/js/webtrends.js', array(), EDD_VERSION, true );
	if ( is_page_template( 'page-section-landing.php' ) ) {
		wp_register_script( 'equal-heights', get_template_directory_uri() . '/js/jQuery.equalHeights.js', array(),
			EDD_VERSION, true );
		wp_register_script( 'equal-heights-var', get_template_directory_uri() . '/js/equalHeights.js', array(),
			EDD_VERSION, true );
		wp_enqueue_script( 'equal-heights' );
		wp_enqueue_script( 'equal-heights-var' );
	}
	wp_enqueue_script( 'global-jquery' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'bootstrap-js' );
	wp_enqueue_script( 'tna-global' );
	wp_enqueue_script( 'webtrends' );
}

add_action( 'wp_enqueue_scripts', 'tna_scripts' );

// Add CSS stylesheet to the dashboard
function load_custom_wp_admin_style() {
	wp_register_style( 'tna-dashboard', get_template_directory_uri() . '/css/dashboard.css', false, '1.0.0' );
	wp_enqueue_style( 'tna-dashboard' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Remove the emoji from the head section
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove Wordpress generator meta from head
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

// Remove REST API
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

// Disables the Google Sitelink Search Box functionality in Yoast's WordPress SEO
add_filter( 'disable_wpseo_json_ld_search', '__return_true' );

// Theme Support
add_theme_support( 'post-thumbnails' );

// Includes
include 'inc/functions/dimox_breadcrumbs.php';
include 'inc/functions/custom-fields.php';
include 'inc/functions/url-rewriting.php';
include 'inc/functions/images.php';
include 'inc/functions/404-redirect.php';
include 'inc/functions/image_caption.php';
include 'inc/functions/tiny_mce.php';
include 'inc/functions/notification-banner.php';

// Gets the first sentence from the content area of a page
if ( ! function_exists( 'first_sentence' ) ) :
	function first_sentence( $content ) {
		$content = strip_tags( $content );
		$pos     = strpos( $content, "." );

		return substr( $content, 0, $pos + 1 );
	}
endif;

// Enables the Excerpt meta box in Page edit screen
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );

