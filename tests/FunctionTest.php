<?php

class FunctionsTest extends PHPUnit_Framework_TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
    }

    // tna-functions.php
    public function test_tna_styles()
    {
        $this->assertTrue(function_exists('tna_styles'));
    }
    public function test_tna_scripts()
    {
        $this->assertTrue(function_exists('tna_scripts'));
    }
    public function test_load_custom_wp_admin_style()
    {
        $this->assertTrue(function_exists('load_custom_wp_admin_style'));
    }
    public function test_first_sentence()
    {
        $this->assertTrue(function_exists('first_sentence'));
    }
    public function test_wpcodex_add_excerpt_support_for_pages()
    {
        $this->assertTrue(function_exists('wpcodex_add_excerpt_support_for_pages'));
    }
    public function test_get_query_string_newsletter_previous_url()
    {
        $this->assertTrue(function_exists('tna_styles'));
    }
}