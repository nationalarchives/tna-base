<?php

// Make styles and scripts paths relative
add_filter( 'script_loader_src', 'tna_styles_scripts_relative' );
add_filter( 'style_loader_src', 'tna_styles_scripts_relative' );
function tna_styles_scripts_relative( $url ) {
    return str_replace( site_url(), '', $url );
}
function make_path_relative( $url ) {
    global $pre_path;
    return str_replace( site_url(), $pre_path, $url );
}
function tna_wp_head() {
    ob_start();
    wp_head();
    $wp_head = ob_get_contents();
    ob_end_clean();
    global $pre_path;
    $wp_head = str_replace( site_url(), 'http://www.nationalarchives.gov.uk' . $pre_path, $wp_head );
    echo $wp_head;
}

// Breadcrumb prefix variable (to be added to child theme)
global $pre_crumbs;
global $pre_path;
$pre_crumbs = ' <span class="sep">&gt;</span> <span><a href="#">About</a></span> ';
$pre_path = '';