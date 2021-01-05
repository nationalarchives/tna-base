<?php

class TNAGlobalsTest extends PHPUnit_Framework_TestCase
{

    protected $preserveGlobalState = FALSE;
    protected $runTestInSeparateProcess = TRUE;

    public function test_served_from_local_machine()
    {
        $this->assertTrue(served_from_local_machine('127.0.0.1', '127.0.0.1', 'When passed identical arguments, true is returned'));
        $this->assertFalse(served_from_local_machine('127.0.0.1', '127.0.0.2', 'When passed non-identical arguments, false is returned'));
    }

    public function test_check_for_specific_url_path_exists()
    {
        $this->assertTrue(function_exists('check_for_specific_url_path'));
    }

    public function test_check_for_specific_url_path()
    {
        $urls = ["https://nationalarchives.gov.uk/contact-us"];
        foreach ($urls as $url) {
            $this->assertNotEquals(check_for_specific_url_path($url), -1);
        }
    }
}


