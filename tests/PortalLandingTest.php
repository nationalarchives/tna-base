<?php

class PortalLandingTest extends PHPUnit_Framework_TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
    }

    public function test_portal_landing_meta_boxes()
    {
        $this->assertTrue(function_exists('portal_landing_meta_boxes'));
    }
    public function test_portal_landing_get_og_meta_on_save()
    {
        $this->assertTrue(function_exists('portal_landing_get_og_meta_on_save'));
    }
    public function test_portal_card_label()
    {
        $this->assertTrue(function_exists('portal_card_label'));
    }
    public function test_portal_card_label_returns()
    {
        $url = 'https://www.nationalarchives.gov.uk/about/news/booking-now-open-for-the-gerald-aylmer-seminar-2018/';
        $label = 'Auto';
        $returns = portal_card_label( $url, $label );
        $this->assertEquals($returns, 'News');
    }
    public function test_portal_card_date()
    {
        $this->assertTrue(function_exists('portal_card_date'));
    }
    public function test_portal_card_date_returns()
    {
        $date = '2018-02-09T18:00';
        $type = 'Event';
        $html = '<div class="entry-date"><div class="date">Friday 9 February 2018, 18:00</div></div>';
        $returns = portal_card_date( $date, $type );
        $this->assertEquals($returns, $html);
    }
    public function test_portal_limit_words()
    {
        $this->assertTrue(function_exists('portal_limit_words'));
    }
    public function test_portal_limit_words_returns()
    {
        $words = 'One two three four five six seven eight';
        $returns = portal_limit_words( $words, 4 );
        $this->assertEquals($returns, 'One two three four...');
    }
    public function test_portal_display_card()
    {
        $this->assertTrue(function_exists('portal_display_card'));
    }
    public function test_portal_display_card_returns()
    {
        $html = '<div class="col-card-4"><div class="card">
					<a id="card-7" href="https://www.nationalarchives.gov.uk/about/news/" class="portal-card">
						<div class="entry-image" style="background-image: url(image.jpg)"></div>
						<div class="entry-content news">
							<div class="content-type">News</div>
							<h3>Booking now open for the Gerald Aylmer Seminar 2018</h3>
							<p>Diversity and inclusive histories are the focus of this year\'s seminar</p>
						</div>
					</a>
				</div></div>';
        $i = 7;
        $url = 'https://www.nationalarchives.gov.uk/about/news/';
        $title = 'Booking now open for the Gerald Aylmer Seminar 2018';
        $excerpt = 'Diversity and inclusive histories are the focus of this year\'s seminar';
        $image = 'image.jpg';
        $date = '';
        $label = 'News';
        $returns = portal_display_card( $i, $url, $title, $excerpt, $image, $date, $label );
        $this->assertEquals($returns, $html);
    }
    public function test_portal_connect_bar()
    {
        $this->assertTrue(function_exists('portal_connect_bar'));
    }
    public function test_portal_brand()
    {
        $this->assertTrue(function_exists('portal_brand'));
    }
    public function test_portal_brand_returns()
    {
        $html = '<div class="portal-logo">
					<img src="logo.png" alt="Title" class="img-responsive">
				</div>';
        $logo = 'logo.png';
        $title = 'Title';
        $returns = portal_brand( $logo, $title );
        $this->assertEquals($returns, $html);
    }
    public function test_portal_fallback_card()
    {
        $this->assertTrue(function_exists('portal_fallback_card'));
    }
    public function test_portal_validate_date()
    {
        $this->assertTrue(function_exists('portal_validate_date'));
    }
    public function test_portal_validate_date_returns_true()
    {
        $date = '2018-02-09T18:00';
        $returns = portal_validate_date( $date );
        $this->assertEquals($returns, true);
    }
    public function test_portal_validate_date_returns_false()
    {
        $date = '2018-13-09T18:00';
        $returns = portal_validate_date( $date );
        $this->assertEquals($returns, false);
    }
    public function test_portal_is_card_active()
    {
        $this->assertTrue(function_exists('portal_is_card_active'));
    }
}