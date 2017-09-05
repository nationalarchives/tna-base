<?php
global $post;

$image      = make_path_relative_no_pre_path( get_feature_image_url( 'full-page-width', true ) );
$title      = get_the_title();
$content    = get_the_content();
$button     = get_post_meta( $post->ID, 'action_button_title', true );
$url        = get_post_meta( $post->ID, 'action_button_url', true );

get_page_banner( 'level one', $title, $image, $content, $button, $url );
