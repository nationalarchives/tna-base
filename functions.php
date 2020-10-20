<?php

// Theme version
define( 'EDD_VERSION', '2.4.1' );

// Add this constant to wp-config.php
// define( 'TNA_CLOUD', false );

global $cloud;
$cloud = (defined('TNA_CLOUD')) ? TNA_CLOUD : false;

// Included classes
include 'src/CreateMetaBox.php';

// Include functions
include 'inc/functions-non-cloud.php';
include 'inc/tna-functions.php';
include 'inc/title-tag.php';
include 'inc/functions-breadcrumbs.php';
include 'inc/custom-fields.php';
include 'inc/images.php';
include 'inc/404-redirect.php';
include 'inc/image-caption.php';
include 'inc/functions-editor-tinymce.php';
include 'inc/notification-banner.php';
include 'inc/template-parts.php';
include 'inc/functions-admin.php';
include 'inc/functions-og-meta.php';
include 'inc/functions-portal-landing.php';
include 'inc/functions-level-one.php';
include 'inc/functions-cards.php';
include 'inc/functions-cards-og-meta.php';

// add_action
add_action( 'wp_enqueue_scripts', 'tna_styles' );
add_action( 'wp_enqueue_scripts', 'tna_scripts' );
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
add_action( 'after_setup_theme', 'theme_slug_setup' ); // title tag
add_action( 'after_setup_theme', 'tna_theme_setup' ); // images
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );
add_action( 'admin_menu', 'add_banner_menu_item' );
add_action( 'admin_init', 'display_banner_panel_fields' );
add_action( 'init', 'add_button' ); // tinymce
add_action( 'add_meta_boxes', 'myfield_add_custom_box' ); // Metabox for Feature Box
add_action( 'save_post', 'myfield_save_postdata' ); // Saving the data entered
add_action( 'add_meta_boxes', 'redirect_url_add_meta_box' ); // Redirect metabox
add_action( 'save_post', 'redirect_url_save' );
add_action( 'save_post', 'sidebar_save' );
add_action( 'init', 'level_1_meta_boxes' ); // To be removed with template
add_action( 'save_post', 'webchat_save' );
add_action( 'init', 'level_one_meta_boxes' );
add_action( 'init', 'notification_meta_boxes' );
add_action( 'admin_menu', 'tna_base_menu' );
add_action( 'init', 'portal_landing_meta_boxes' );
add_action( 'save_post', 'portal_landing_get_og_meta_on_save' );
add_action( 'save_post', 'get_meta_og_on_save' );
add_action( 'save_post', 'check_card_labels', 10, 2);
add_action( 'admin_notices', 'level_one_card_error' );

// add_filter
add_filter( 'document_title_parts', 'title_tag', 10, 1 );
add_filter( 'disable_wpseo_json_ld_search', '__return_true' ); // Disables Google Sitelink Search Box in Yoast's SEO
add_filter( 'template_redirect', 'redirect_if_404' );
add_filter( 'attachment_fields_to_edit', 'image_caption_fields', 10, 2 );
add_filter( 'attachment_fields_to_save', 'save_image_caption_fields', 10, 2 );
add_filter( 'image_size_names_choose', 'profile_img' );
add_filter( 'the_content', 'add_image_responsive_class' );
add_filter( 'img_caption_shortcode', 'my_img_caption_shortcode', 10, 3 );
add_filter( 'wp_calculate_image_sizes', 'content_image_sizes_attr', 10 , 2 );
add_filter( 'tiny_mce_before_init', 'classes_tinymce' );
add_filter( 'script_loader_src', 'tna_styles_scripts_relative' );
add_filter( 'style_loader_src', 'tna_styles_scripts_relative' );
add_filter( 'the_content', 'make_content_urls_relative' );
add_filter( 'xmlrpc_enabled', '__return_false' );

// Enable css style inside editor
add_editor_style( get_template_directory_uri() . '/css/dashboard.css' );

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

// Theme Support
add_theme_support( 'post-thumbnails' );

// Call shortcode inside wordpress by using [newsletter-back-button]
add_shortcode('newsletter-back-button', 'get_query_string_newsletter_previous_url');

// Set path to mega menu HTML
set_path_to_mega_menu(served_from_local_machine($_SERVER['SERVER_ADDR'], $_SERVER['REMOTE_ADDR']));

if ( $_SERVER['REQUEST_URI'] == '/xmlrpc.php' || $_SERVER['REQUEST_URI'] == '/xmlrpc.php?rsd' ) {
	wp_redirect( site_url() );
	exit;
}