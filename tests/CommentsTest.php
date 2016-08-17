<?php

class CommentsTest extends PHPUnit_Framework_TestCase
{
    /**
     *  Test if comments.php template exists
     * commnets.php is mandatory since wordpress version 3.0
     * If deleted a php error will be displayed in debug mode
     */
    public function testIfCommExists()
    {
        $this->assertFileExists('comments.php');
    }
}
