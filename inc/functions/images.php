<?php

// Alter image sizes for landing page template and srcset
add_action( 'after_setup_theme', 'tna_theme_setup' );
function tna_theme_setup() {
	add_image_size( 'landing-page-children-thumb', 768, 244, array( 'center', 'center' ) ); // for section landing page template
	add_image_size( 'feature-box-thumb', 768, 1152 ); // for section landing page template
	add_image_size( 'full-page-width', 1196, 288, array( 'center', 'center' ) ); // for level 1 landing page template
	add_image_size( 'srcset-img-lg', 777 );
	add_image_size( 'srcset-img-md', 592 );
	add_image_size( 'srcset-img-sm', 419 );
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

// Optimized srcset sizes attribute
function content_image_sizes_attr($sizes, $size) {
	$width = $size[0];
	if ( is_page() && !is_page_template() ) {
		if ($width > 768) {
			return '(max-width: 489px) 419px, (max-width: 672px) 592px, (max-width: 767px) 777px, (max-width: 768px) 419px, (max-width: 992px) 592px, (max-width: 1200px) 777px, 777px';
		}
		return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
	}
	return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
}
add_filter('wp_calculate_image_sizes', 'content_image_sizes_attr', 10 , 2);