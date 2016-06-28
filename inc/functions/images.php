<?php

// Alter image sizes for landing page template and srcset
add_action( 'after_setup_theme', 'tna_theme_setup' );
function tna_theme_setup() {
	add_image_size( 'landing-page-children-thumb', 768, 244, array( 'center', 'center' ) ); // for section landing page template
	add_image_size( 'feature-box-thumb', 768, 1152 ); // for section landing page template
	add_image_size( 'full-page-width', 1196, 288, array( 'center', 'center' ) ); // for level 1 landing page template
	add_image_size( 'srcset-img-lg', 777 );
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
function add_image_responsive_class( $content ) {
	global $post;
	$pattern ='/<img(.*?)class=\"(.*?)\"(.*?)>/i';
	$replacement = '<img$1class="$2 img-responsive"$3>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}
add_filter('the_content', 'add_image_responsive_class');

// Amends attr for wp-caption
// See https://codex.wordpress.org/Plugin_API/Filter_Reference/img_caption_shortcode
add_filter( 'img_caption_shortcode', 'my_img_caption_shortcode', 10, 3 );
function my_img_caption_shortcode( $empty, $attr, $content ){
	$attr = shortcode_atts( array(
		'id'      => '',
		'align'   => 'alignnone',
		'width'   => '',
		'caption' => ''
	), $attr );
	if ( 1 > (int) $attr['width'] || empty( $attr['caption'] ) ) {
		return '';
	}
	if ( $attr['id'] ) {
		$attr['id'] = 'id="' . esc_attr( $attr['id'] ) . '" ';
	}
	return '<div ' . $attr['id']
	       . 'class="wp-caption ' . esc_attr( $attr['align'] ) . '" '
	       . 'style="max-width: ' . ( (int) $attr['width'] ) . 'px;">'
	       . do_shortcode( $content )
	       . '<p class="wp-caption-text">' . $attr['caption'] . '</p>'
	       . '</div>';
}

// Optimized srcset sizes attribute
function content_image_sizes_attr($sizes, $size) {
	$width = $size[0];
	if ( is_page() && !is_page_template() ) {
		if ($width >= 768) {
			return '(max-width: 375px) 300px, (max-width: 768px) 768px, (max-width: 992px) 777px, (max-width: 1200px) 1024px, 777px';
		}
		return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
	}
	return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
}
add_filter('wp_calculate_image_sizes', 'content_image_sizes_attr', 10 , 2);
