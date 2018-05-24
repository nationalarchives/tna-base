<?php
/**
 * Functions for TNA infrastructure (non cloud)
 *
 */

// Make styles and scripts paths relative
function tna_styles_scripts_relative( $content ) {
	global $cloud;
	if (!$cloud) {
		return str_replace( site_url(), '', $content );
	} else {
		return $content;
	}
}
// Make template URLs relative
function make_path_relative( $url ) {
	global $cloud;
	if (!$cloud && function_exists('site_url')) {
		global $pre_path;
		return str_replace( site_url(), $pre_path, $url );
	} else {
		return $url;
	}
}
// Make template URLs relative without the $pre_path
function make_path_relative_no_pre_path( $url ) {
	global $cloud;
	if (!$cloud) {
		return str_replace( site_url(), '', $url );
	} else {
		return $url;
	}
}
// Fix URLs in wp_head
function tna_wp_head() {
	ob_start();
	wp_head();
	$wp_head = ob_get_contents();
	ob_end_clean();
	global $pre_path;
	global $cloud;
	if (!$cloud) {
		$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
		$wp_head = str_replace( site_url(), $protocol.'://www.nationalarchives.gov.uk' . $pre_path, $wp_head );
	}
	echo $wp_head;
}

// Make content URLs relative
function make_content_urls_relative( $content ) {
	global $cloud;
	if (!$cloud) {
		global $pre_path;
		return str_replace( site_url(), $pre_path, $content );
	} else {
		return $content;
	}
}

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

function check_for_specific_url_path($url_path = '') {
	$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$url = $protocol.'://nationalarchives.gov.uk';
	return strpos($url,$url_path);
}
