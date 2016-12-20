<?php

/**
 * @param $server_ip - obtained from $_SERVER['SERVER_NAME']
 * @param $remote_ip - obtained from $_SERVER['REMOTE_ADDR']
 *
 * @return bool
 */
function served_from_local_machine($server_ip, $remote_ip)
{
    return ($server_ip === $remote_ip);
}

/**
 * @param $development_machine - boolean obtained from calling served_from_local_machine()
 */
function set_path_to_mega_menu($development_machine)
{
    if ($development_machine === true) {
        define("PATH_TO_MEGA_MENU_HTML", 'output.html');
    } else {
        define("PATH_TO_MEGA_MENU_HTML", 'D:/webapps/phpapps/mega-menu-feed-processor/output.html');
    }
}

// Get Query String Old URL for THANK YOU newsletter page
function get_query_string_newsletter_previous_url()
{
    // Declare variables
    $request_uri = $_SERVER['REQUEST_URI'];
    $return_url = preg_replace('/.*oldurl=(.*)&result.*/', '$1', $request_uri);
    $safe_url = filter_var($return_url, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tna_url = "nationalarchives.gov.uk";
    $valid_tna_url = strpos($request_uri, $tna_url);

    // If TNA domain exist in the URL do stuff
    if ($valid_tna_url !== false) {
        return sprintf('<a class="button" href="%s">Back to previous page</a>', $safe_url);
    } else {
        return sprintf('<a class="button" href="http://www.%s">Back to home page</a>', $tna_url);
    }
}

// Call shortcode inside wordpress by using [newsletter-back-button]
add_shortcode('newsletter-back-button', 'get_query_string_newsletter_previous_url');