<?php

// Make styles and scripts paths relative
function tna_styles_scripts_relative( $url ) {
    return str_replace( site_url(), '', $url );
}
// Make template URLs relative
function make_path_relative( $url ) {
    global $pre_path;
    return str_replace( site_url(), $pre_path, $url );
}
// Fix URLs in wp_head
function tna_wp_head() {
    ob_start();
    wp_head();
    $wp_head = ob_get_contents();
    ob_end_clean();
    $wp_head = str_replace( site_url(), 'http://www.nationalarchives.gov.uk', $wp_head );
    echo $wp_head;
}
// Make content URLs relative
function make_content_urls_relative( $content ) {
	return str_replace( site_url(), '', $content );
}

