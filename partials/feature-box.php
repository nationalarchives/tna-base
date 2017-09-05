<?php
global $post;

$image              = make_path_relative_no_pre_path( get_feature_image_url( 'feature-box-thumb' ) );
$title              = get_the_title();
$content            = get_the_content();
$section_content    = get_post_meta( $post->ID, 'feat_box', true );

get_page_banner( 'section', $title, $image, $content, '', '', $section_content );
