<?php
/**
 * Breadcrumbs for cloud
 */

function tna_breadcrumbs() {

    $permalink = get_permalink();

    if ( $permalink !== network_site_url() ) {
        $link = str_replace( network_site_url(), '', $permalink );
    } else {
        $link = null;
    }

    $link = rtrim($link, '/');
    $link = ltrim($link, '/');

    $link_parts = explode('/', rtrim($link, '/'));

    $last = end($link_parts);

    echo '<div class="breadcrumbs">';

    foreach ( $link_parts as $part ) {
        echo '<span>' . $part . '</span>';
        if ($part !== $last) {
            echo ' <span class="sep">&gt;</span> ';
        }
    }

    echo '</div>';

}