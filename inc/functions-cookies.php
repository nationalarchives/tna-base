<?php
// These functions are going to be moved into the plugin
// upon cross site roll-out

function delete_GA_cookies() {
	$domain = 'nationalarchives.gov.uk';
	$cookie_list = ['_ga', '_gid', '_gat_UA-2827241-22', '_gat_UA-2827241-1'];
    
	if (isset($_SERVER['HTTP_COOKIE'])) {
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
		foreach($cookies as $cookie) {
			$parts = explode('=', $cookie);
			$name = trim($parts[0]);
			foreach($cookie_list as $single_cookie) {
				if($name == $single_cookie) {
                    unset( $_COOKIE[$name] );
                    setcookie($name, '', time()-1000, '/', '.' . $domain);
                    setcookie($name, '', time()-1000, '/', $domain);
                    setcookie($name, '', time()-1000, '/');
                }
			}
		}
	}
}

function handle_GA_script(string $global_cookie) {
    global $wp;
    $siteUrl = add_query_arg( $wp->query_vars);
    
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

