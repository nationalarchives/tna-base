<?php

class FunctionsTest extends PHPUnit_Framework_TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
    }

    public function test_exists_tna_styles()
    {
        $this->assertTrue(function_exists('tna_styles'));
    }
    public function test_exists_tna_scripts()
    {
        $this->assertTrue(function_exists('tna_scripts'));
    }
    public function test_exists_load_custom_wp_admin_style()
    {
        $this->assertTrue(function_exists('load_custom_wp_admin_style'));
    }
    public function test_exists_first_sentence()
    {
        $this->assertTrue(function_exists('first_sentence'));
    }
    public function test_exists_wpcodex_add_excerpt_support_for_pages()
    {
        $this->assertTrue(function_exists('wpcodex_add_excerpt_support_for_pages'));
    }
    public function test_exists_get_query_string_newsletter_previous_url()
    {
        $this->assertTrue(function_exists('tna_styles'));
    }

    public function test_exists_redirect_if_404()
    {
        $this->assertTrue(function_exists('redirect_if_404'));
    }

    public function test_exists_dimox_breadcrumbs()
    {
        $this->assertTrue(function_exists('dimox_breadcrumbs'));
    }

    public function test_exists_image_caption_fields()
    {
        $this->assertTrue(function_exists('image_caption_fields'));
    }
    public function test_exists_save_image_caption_fields()
    {
        $this->assertTrue(function_exists('save_image_caption_fields'));
    }
    public function test_exists_get_image_caption()
    {
        $this->assertTrue(function_exists('get_image_caption'));
    }

    public function test_exists_notification_banner()
    {
        $this->assertTrue(function_exists('notification_banner'));
    }
    public function test_exists_banner_settings_page()
    {
        $this->assertTrue(function_exists('banner_settings_page'));
    }
    public function test_exists_add_banner_menu_item()
    {
        $this->assertTrue(function_exists('add_banner_menu_item'));
    }
    public function test_exists_enable_banner_element()
    {
        $this->assertTrue(function_exists('enable_banner_element'));
    }
    public function test_exists_banner_title_element()
    {
        $this->assertTrue(function_exists('banner_title_element'));
    }
    public function test_exists_banner_text_element()
    {
        $this->assertTrue(function_exists('banner_text_element'));
    }
    public function test_exists_display_banner_panel_fields()
    {
        $this->assertTrue(function_exists('display_banner_panel_fields'));
    }

    public function test_exists_add_button()
    {
        $this->assertTrue(function_exists('add_button'));
    }
    public function test_exists_register_button()
    {
        $this->assertTrue(function_exists('register_button'));
    }
    public function test_exists_add_plugin()
    {
        $this->assertTrue(function_exists('add_plugin'));
    }
    public function test_exists_classes_tinymce()
    {
        $this->assertTrue(function_exists('classes_tinymce'));
    }

    public function test_exists_theme_slug_setup()
    {
        $this->assertTrue(function_exists('theme_slug_setup'));
    }
    public function test_exists_title_tag()
    {
        $this->assertTrue(function_exists('title_tag'));
    }

    public function test_exists_tna_styles_scripts_relative()
    {
        $this->assertTrue(function_exists('tna_styles_scripts_relative'));
    }
    public function test_exists_make_path_relative()
    {
        $this->assertTrue(function_exists('make_path_relative'));
    }
    public function test_exists_make_path_relative_no_pre_path()
    {
        $this->assertTrue(function_exists('make_path_relative_no_pre_path'));
    }
    public function test_exists_tna_wp_head()
    {
        $this->assertTrue(function_exists('tna_wp_head'));
    }
    public function test_exists_make_content_urls_relative()
    {
        $this->assertTrue(function_exists('make_content_urls_relative'));
    }

    public function testCreateMetaBox()
    {
        $this->assertTrue( class_exists('CreateMetaBox') );
    }

    public function test_exists_myfield_add_custom_box()
    {
        $this->assertTrue( function_exists('myfield_add_custom_box') );
    }
    public function test_exists_myfield_meta_box()
    {
        $this->assertTrue( function_exists('myfield_meta_box') );
    }

    public function test_exists_myfield_save_postdata()
    {
        $this->assertTrue( function_exists('myfield_save_postdata') );
    }

    public function test_exists_redirect_url_get_meta()
    {
        $this->assertTrue( function_exists('redirect_url_get_meta') );
    }

    public function test_exists_redirect_url_html()
    {
        $this->assertTrue( function_exists('redirect_url_html') );
    }

    public function test_exists_redirect_url_save()
    {
        $this->assertTrue( function_exists('redirect_url_save') );
    }

    public function test_exists_sidebar_get_meta()
    {
        $this->assertTrue( function_exists('sidebar_get_meta') );
    }

    public function test_exists_sidebar_html()
    {
        $this->assertTrue( function_exists('sidebar_html') );
    }

    public function test_exists_sidebar_save()
    {
        $this->assertTrue( function_exists('sidebar_save') );
    }

    public function test_exists_level_one_meta_boxes()
    {
        $this->assertTrue( function_exists('level_one_meta_boxes') );
    }

    public function test_exists_notification_meta_boxes()
    {
        $this->assertTrue( function_exists('notification_meta_boxes') );
    }
}