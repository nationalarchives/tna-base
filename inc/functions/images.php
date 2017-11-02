<?php

// Alter image sizes for landing page template and srcset
function tna_theme_setup() {
	add_image_size( 'landing-page-children-thumb', 768, 244, array( 'center', 'center' ) ); // for section landing page template
	add_image_size( 'feature-box-thumb', 768, 1152 ); // for section landing page template
	add_image_size( 'full-page-width', 1196, 288, array( 'center', 'center' ) ); // for level 1 landing page template
	add_image_size( 'srcset-img-lg', 777 );

	// Add profile thumbnail size
	add_image_size( 'new-size', 210, 260 );
}

/**
 * @param $profile_size
 * @return array
 */
function profile_img($profile_size) {
	$add_profile_size = array(
		"new-size" => __( "Profile")
	);
	$new_profile_sizes = array_merge($profile_size, $add_profile_size);
	return $new_profile_sizes;
}

// Adds img-responsive class to img tag within content
/**
 * @param $content
 * @return mixed
 */
function add_image_responsive_class($content ) {
	global $post;
	$pattern ='/<img(.*?)class=\"(.*?)\"(.*?)>/i';
	$replacement = '<img$1class="$2 img-responsive"$3>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}

// Amends attr for wp-caption
// See https://codex.wordpress.org/Plugin_API/Filter_Reference/img_caption_shortcode
/**
 * @param $empty
 * @param $attr
 * @param $content
 * @return string
 */
function my_img_caption_shortcode($empty, $attr, $content ){
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
/**
 * @param $sizes
 * @param $size
 * @return string
 */
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

function get_feature_image_url( $id, $size, $background = false ) {

	if ( has_post_thumbnail() ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );
	} else {
		$image[0] = '';
	}

	if ( $background && $image[0] ) {
		return 'style="background-image: url('. $image[0] . ');"';
	} else {
		return $image[0];
	}
}

