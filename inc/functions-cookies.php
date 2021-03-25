<?php
// These functions are going to be moved into the plugin
// upon cross site roll-out

function delete_GA_cookies() {
	$domain = 'nationalarchives.local';
	$cookie_list = ['_ga', '_gid', '_gat_UA-2827241-22', '_gat_UA-2827241-1'];
    
	if (isset($_SERVER['HTTP_COOKIE'])) {
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
		foreach($cookies as $cookie) {
			$parts = explode('=', $cookie);
			$name = trim($parts[0]);
			foreach($cookie_list as $single_cookie) {
				if($name == $single_cookie) {
                    clear_cookie($name, $domain);
                }
			}
		}
	}
}

function handle_GA_script(string $global_cookie) {
    $siteUrl = site_url();

    if (strpos($siteUrl, 'latin') !== false) {            
        if(isset($_COOKIE[$global_cookie])) {
            $cookie = $_COOKIE[$global_cookie];
            $clean_cookie = preg_replace('/\\\\/', '', $cookie);
            $cookies_policy_to_obj = json_decode( $clean_cookie );
			if($cookies_policy_to_obj->usage == true) { 
				include 'gtm-script.php';
			} 
        }

    } else { 
        include 'gtm-script.php';
    }
}

// New Cookie Consent
//! This part of the code is going to be moved into the plugin
if ( isset($_POST['measure-website-use']) ) {
	if (function_exists('delete_GA_cookies')) {
		add_action( 'init', 'delete_GA_cookies' );
   }
}

// Remove cookies if available when coming from Latin
function remove_cookies_on_page_load() {
	$siteUrl = site_url();
	$global_cookie = 'cookies_policy';
	
	if (strpos($siteUrl, 'latin') !== false) {            
		if(isset($_COOKIE[$global_cookie])) {
			$cookie = $_COOKIE[$global_cookie];
			$clean_cookie = preg_replace('/\\\\/', '', $cookie);
			$cookies_policy_to_obj = json_decode( $clean_cookie );
			if($cookies_policy_to_obj->usage === false) { 
				add_action( 'init', 'delete_GA_cookies' );
			}
		}
	}
}

// Cookie banner custom hook
function wp_cookie_banner_hook() {
	do_action('wp_cookie_banner_hook');
}

function clear_cookie($cookie_name, $cookie_domain) {
	unset( $_COOKIE[$cookie_name] );
	setcookie($cookie_name, '', time()-10000000, '/', '.' . $cookie_domain);
	setcookie($cookie_name, '', time()-10000000, '/', $cookie_domain);
	setcookie($cookie_name, '', time()-10000000, '/');
}

// Remove GA cookies on page load
remove_cookies_on_page_load();