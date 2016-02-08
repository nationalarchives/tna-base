<?php

// Enqueue styles and scripts
function tna_styles() {
	wp_register_style( 'tna-styles', get_template_directory_uri() . '/css/base-sass.css', array(), '0.1', 'all' );
	wp_register_style( 'tna-google-fonts',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic|Bitter', '', '', 'all' );
	wp_enqueue_style( 'tna-styles' );
	wp_enqueue_style( 'tna-google-fonts' );
}
add_action( 'wp_enqueue_scripts', 'tna_styles' );

function tna_scripts() {
	wp_register_script( 'global-jquery', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), '1.11.3' );
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6', true );
	wp_register_script( 'tna-global', get_template_directory_uri() . '/js/tna-global.js', array(), '0.1', true );
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
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action('wp_head', 'feed_links_extra', 3);
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

// Theme Support
add_theme_support( 'post-thumbnails' );

// Includes
include 'inc/functions/dimox_breadcrumbs.php';
include 'inc/functions/custom-fields.php';
include 'inc/functions/url-rewriting.php';


/* Alter image sizes for landing page template */
add_action( 'after_setup_theme', 'tna_theme_setup' );
function tna_theme_setup()
{
	//add_image_size( 'landing-page-thumb', 588, 180, true ); // (cropped)
	add_image_size('landing-page-children-thumb', 600, 180, array( 'center', 'center' ) ); // 600 px wide and 180px height)
}
/* Alter image sizes for landing page template */


/* Gets the first sentence from the content area of a page. */
if (!function_exists('first_sentence')) :
	function first_sentence($content)
	{
		$content = strip_tags($content);
		$pos = strpos($content, ".");
		return substr($content, 0, $pos + 1);
	}
endif;


function change_layout() {
	global $post;
	$content_with_feat_box = '<div class="col-md-8">';
	$content_with_feat_img = '<div class="col-md-6">';
	$feat_box = get_post_meta(get_the_ID(), 'feat_box', true);
	if (!empty( $feat_box )) { // This is the custom field block
		echo $content_with_feat_box;
		if (have_posts()) :
			while (have_posts()) :
				the_post();
				the_content();
				echo '</div>';
				echo '<div class="col-md-4"><div class="well">'.$feat_box.'</div></div>';
			endwhile;
		endif;
	} elseif (has_post_thumbnail()) { // This is the feature image block.
		echo $content_with_feat_img;
		if (have_posts()) :
			while (have_posts()) :
				the_post();
				the_content();
				echo '</div>';
				echo '<div class="col-md-6">';
				the_post_thumbnail( 'landing-page-children-thumb', array( 'class' => 'img-responsive' ) );
				echo '</div>';
			endwhile;
		endif;
	} elseif (empty($feat_box) && the_post_thumbnail() == null){
		echo $content_with_feat_box;
		if (have_posts()) :
			while (have_posts()) :
				the_post();
				the_content();
			endwhile;
		endif;
		echo '</div>';
		echo '<div class="col-md-4">&nbsp;</div>';
	}
}