<?php

class CommentsTest extends PHPUnit_Framework_TestCase
{
    /**
     *  Test if comments.php template exists
     */
    public function testIfCommExists()
    {
        $this->assertFileExists('comments.php');
    }
}
