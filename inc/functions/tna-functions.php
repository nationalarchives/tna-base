<?php
/**
 * TNA Functions
 */

// Enqueue styles and scripts
function tna_styles() {
	wp_register_style( 'tna-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(), EDD_VERSION, 'all' );
	wp_register_style( 'tna-google-fonts',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic|Bitter', '', '', 'all' );
	wp_enqueue_style( 'tna-styles' );
	wp_enqueue_style( 'tna-google-fonts' );
}
function tna_scripts() {
	wp_register_script( 'global-jquery', get_template_directory_uri() . '/js/lib/jquery-1.11.3.min.js', array(), '1.11.3' );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/lib/modernizr.js', array(), '2.8.3', false );
	wp_register_script( 'tna-base-min', get_template_directory_uri() . '/js/compiled/tna-base.min.js', array(), EDD_VERSION, true );
	wp_register_script( 'webtrends', get_template_directory_uri() . '/js/lib/webtrends.js', array(), EDD_VERSION, true );
	if ( is_page_template( 'page-section-landing.php' ) || is_page_template( 'page-level-1-landing.php') || is_category() ) {
		wp_register_script( 'equal-heights', get_template_directory_uri() . '/js/lib/jQuery.equalHeights.js', array(),
			EDD_VERSION, true );
		wp_register_script( 'equal-heights-var', get_template_directory_uri() . '/js/equalHeights.js', array(),
			EDD_VERSION, true );
		wp_enqueue_script( 'equal-heights' );
		wp_enqueue_script( 'equal-heights-var' );
	}
	wp_enqueue_script( 'global-jquery' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'webtrends' );
	wp_enqueue_script( 'tna-base-min' );
}

// Add CSS stylesheet and JS to the dashboard
function load_custom_wp_admin_style() {
	wp_register_style( 'tna-dashboard', get_template_directory_uri() . '/css/dashboard.css', false, '1.0.0' );
	wp_enqueue_style( 'tna-dashboard' );

	wp_register_script('tna-dashboard-scripts', get_template_directory_uri() . '/js/admin.js', array(), EDD_VERSION );
	wp_enqueue_script('tna-dashboard-scripts');
}

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

// Get Query String Old URL for THANK YOU newsletter page
function get_query_string_newsletter_previous_url() {
	// Declare variables
	$request_uri = $_SERVER['REQUEST_URI'];
	$return_url = preg_replace('/.*oldurl=(.*)&result.*/', '$1', $request_uri);
	$safe_url = filter_var($return_url, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$tna_url = "nationalarchives.gov.uk";
	$valid_tna_url = strpos($request_uri, $tna_url);

	// If TNA domain exist in the URL do stuff
	if ($valid_tna_url !== false) {
		return sprintf('<a class="button" href="%s">Back to previous page</a>', $safe_url);
	} else {
		return sprintf('<a class="button" href="http://www.%s">Back to home page</a>', $tna_url);
	}
}