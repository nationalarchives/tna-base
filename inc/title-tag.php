<?php
/**
 * Title tag function
 */

function theme_slug_setup() {
	add_theme_support( 'title-tag' );
}

function title_tag( $title ) {
	$tnaNetworkSiteName = 'The National Archives';
	if ( is_home() || is_front_page() ) {
		unset( $title['tagline'] );
	}
	$title['title'] = get_the_title();
	$title['site'] = $tnaNetworkSiteName;
	return $title;
}
