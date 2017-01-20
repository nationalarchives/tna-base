<?php

// Theme version
define( 'EDD_VERSION', '1.6' );

// Included classes
include 'src/CreateMetaBox.php';

// Include functions
include 'inc/functions/tna-functions.php';
include 'inc/functions/title-tag.php';
include 'inc/functions/tna-globals.php';
include 'inc/functions/dimox_breadcrumbs.php';
include 'inc/functions/custom-fields.php';
include 'inc/functions/url-rewriting.php';
include 'inc/functions/images.php';
include 'inc/functions/404-redirect.php';
include 'inc/functions/image_caption.php';
include 'inc/functions/tiny_mce.php';
include 'inc/functions/notification-banner.php';

// add_action
add_action( 'wp_enqueue_scripts', 'tna_styles' );
add_action( 'wp_enqueue_scripts', 'tna_scripts' );
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
add_action( 'after_setup_theme', 'theme_slug_setup' );
add_action( 'after_setup_theme', 'tna_theme_setup' ); // images
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );
add_action( 'admin_menu', 'add_banner_menu_item' );
add_action( 'admin_init', 'display_banner_panel_fields' );

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

// Set path to mega menu HTML
set_path_to_mega_menu(served_from_local_machine($_SERVER['SERVER_ADDR'], $_SERVER['REMOTE_ADDR']));

// Call shortcode inside wordpress by using [newsletter-back-button]
add_shortcode('newsletter-back-button', 'get_query_string_newsletter_previous_url');


