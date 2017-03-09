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

function check_for_specific_url_path($url_path = ''){
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    return strpos($url,$url_path);
}