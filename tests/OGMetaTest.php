<?php

class OGMetaTest extends PHPUnit_Framework_TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
    }

    public function test_url_content_exists()
    {
        $this->assertTrue(function_exists('url_content_exists'));
    }
    public function test_get_content_from_url()
    {
        $this->assertTrue(function_exists('get_content_from_url'));
    }
    public function test_get_og_meta()
    {
        $this->assertTrue(function_exists('get_og_meta'));
    }
}