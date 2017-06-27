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
    $link_parts = explode('/', $link);

    $last = end($link_parts);
    $url = '';

    echo '<div class="breadcrumbs">';

    if (is_home() || is_front_page()) {
        echo '<span><a href="' . network_site_url() . '/' . '">Home</a></span>';
    } else {
        echo '<span><a href="' . network_site_url() . '/' . '">Home</a></span>';
        echo ' <span class="sep">&gt;</span> ';

        foreach ( $link_parts as $part ) {

            $url .= $part . '/';
            $full_url = network_site_url() . '/' . $url;
            $id = url_to_postid( $full_url );
            $title = get_the_title( $id );

            if ($part !== $last) {
                echo '<span><a href="' . $full_url . '">' . $title . '</a></span>';
                echo ' <span class="sep">&gt;</span> ';
            } else {
                echo '<span>' . $title . '</span>';
            }
        }
    }

    echo '</div>';

}