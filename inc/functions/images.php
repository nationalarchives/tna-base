<?php

// Alter image sizes for landing page template
add_action( 'after_setup_theme', 'tna_theme_setup' );
function tna_theme_setup() {
	add_image_size( 'landing-page-children-thumb', 768, 244, array( 'center', 'center' ) );
	add_image_size( 'feature-box-thumb', 768, 1152 ); // for section landing page template
	add_image_size( 'default-page-header', 820, 546 ); // for default page on FWW portal
	add_image_size( 'full-page-width', 1196, 288, array( 'center', 'center' ) ); // for level 1 landing page template
}

// Add profile thumbnail size
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'new-size', 210, 260);
}
function profile_img($profile_size) {
	$add_profile_size = array(
		"new-size" => __( "Profile")
	);
	$new_profile_sizes = array_merge($profile_size, $add_profile_size);
	return $new_profile_sizes;
}
add_filter('image_size_names_choose', 'profile_img');

// Adds img-responsive class to img tag within content
function add_image_responsive_class($content) {
	global $post;
	$pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
	$replacement = '<img$1class="$2 img-responsive"$3>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}
add_filter('the_content', 'add_image_responsive_class');