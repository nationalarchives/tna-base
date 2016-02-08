<?php
/* URL rewriting functions */
if (!function_exists('fix_internal_url')) :
function fix_internal_url($url) {
$arrUrl = parse_url($url);
$returnUrl  = ( !empty( $GLOBALS['tnatheme']['subsitepath'] ) ) ? $GLOBALS['tnatheme']['subsitepath'] : '';
$returnUrl .= $arrUrl[ 'path' ];
$returnUrl .= isset( $arrUrl[ 'query' ] ) ? '?' . $arrUrl[ 'query' ] : '';
$returnUrl .= isset( $arrUrl[ 'fragment' ] ) ? '#' . $arrUrl[ 'fragment' ] : '';
return  $returnUrl;
}
endif;
if (!function_exists('make_urls_root_relative')) :
function make_urls_root_relative($url) {
$pattern = "/http:\/\/(.*?)\.gov.uk/";
$replace = ( !empty( $GLOBALS['tnatheme']['subsitepath'] ) ) ? $GLOBALS['tnatheme']['subsitepath'] : '';
$url = preg_replace($pattern, $replace, $url);
return $url;
}
endif;