<?php
/**
 * TNA Functions
 */

// Enqueue styles and scripts
function tna_styles() {
	wp_register_style( 'tna-styles', get_template_directory_uri() . '/css/base-sass.min.css', array(), EDD_VERSION, 'all' );
	wp_register_style( 'tna-google-fonts',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i|Roboto+Mono:400,700&display=swap', '', '', 'all' );
	wp_register_style( 'tna-frontend', get_template_directory_uri() . '/css/tna-frontend-global-header-package.css', array(), '0.2.6', 'all' );
	wp_enqueue_style( 'tna-styles' );
	wp_enqueue_style( 'tna-google-fonts' );
	wp_enqueue_style( 'tna-frontend' );
}
function tna_scripts() {
	wp_register_script( 'global-jquery', get_template_directory_uri() . '/js/lib/jquery-1.11.3.min.js', array(), '1.11.3' );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/lib/modernizr.js', array(), '2.8.3', false );
	wp_register_script( 'tna-base-min', get_template_directory_uri() . '/js/compiled/tna-base.min.js', array(), EDD_VERSION, true );
	wp_register_script( 'tna-components', 'https://cdn.nationalarchives.gov.uk/react-components/dist/website-1.1.8.js', array(), EDD_VERSION, true );
	wp_register_script( 'tna-frontend', get_template_directory_uri() . '/js/lib/tna-frontend.js', array(), '0.2.6', true );
	wp_register_script( 'tna-frontend-analytics', get_template_directory_uri() . '/js/lib/tna-frontend-analytics.js', array(), '0.2.10-prerelease', true );
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
	wp_enqueue_script( 'tna-base-min' );
	wp_enqueue_script( 'tna-components' );
	wp_enqueue_script( 'tna-frontend' );
	wp_enqueue_script( 'tna-frontend-analytics' );
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
    $return_url_second_preg = preg_replace('~.*(?=(http|https)://)~', '', $return_url);
    $url_decoded = esc_url($return_url_second_preg);
    $safe_url = htmlentities($url_decoded, ENT_QUOTES, 'UTF-8');
    $tna_url = "nationalarchives.gov.uk";
    $valid_tna_url = strpos($request_uri, $tna_url);
    // If TNA domain exist in the URL do stuff
    if ($valid_tna_url !== false) {
        return sprintf('<a class="button" href="%s">Back to previous page</a>', $safe_url);
    } else {
        return sprintf('<a class="button" href="https://www.%s">Back to home page</a>', $tna_url);
    }
}

function blog_footer_url( $blog_type ) {
    if ($blog_type == 'amp' || $blog_type == 'blog') {
        return 'https://www.nationalarchives.gov.uk';
    } else {
        return '';
    }
}
