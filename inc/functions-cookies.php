<?php
function delete_cookies(array $cookie_list, $domain) {
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            foreach($cookie_list as $single_cookie) {
                if($name == $single_cookie) {
                    setcookie($name, '', time()-1000);
                    setcookie($name, '', time()-1000, '/');
                    setcookie($name, '', time()-1000, '/', '.' . $domain);
                    setcookie($name, '', time()-1000, '/', $domain);
                }
            }
        }
    }
}

function handle_cookies(string $global_cookie, $cookies_to_remove, $domain) {
    global $wp;
    $siteUrl = add_query_arg( $wp->query_vars);
    
    if (strpos($siteUrl, 'latin') !== false) {            
        
        if(isset($_COOKIE[$global_cookie])) {
            $cookie = $_COOKIE[$global_cookie];
            $clean_cookie = preg_replace('/\\\\/', '', $cookie);
            $cookies_policy_to_obj = json_decode( $clean_cookie );

            if($cookies_policy_to_obj->usage == false) { 
                delete_cookies($cookies_to_remove, $domain);
            }

            if($cookies_policy_to_obj->usage == true) { 
                include 'gtm-script.php';
            } 
        }

    } else { 
        include 'gtm-script.php';
    }
}
   
?>