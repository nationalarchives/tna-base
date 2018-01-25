<?php

/**
 * @param $result
 *
 * @return bool
 */
function url_content_exists( $result ) {

	if ( is_wp_error( $result ) ) {
		$result = false;
	} elseif ( wp_remote_retrieve_response_code( $result ) == '404' ) {
		$result = false;
	} else {
		$result = true;
	}

	return $result;
}

/**
 * Gets the content of a URL via a HTTP request and returns the content.
 *
 * @since 1.9
 *
 * @param string $url
 *
 * @return string
 */
function get_content_from_url( $url ) {

	if ( ! class_exists( 'WP_Http' ) ) {
		include_once( ABSPATH . WPINC . '/class-http.php' );
	}

	$request = new WP_Http;
	$result  = $request->request( $url );

	if ( url_content_exists( $result ) ) {
		$content = $result['body'];
	} else {
		$content = null;
	}

	return $content;
}

/**
 * Extracts the OG meta data.
 *
 * @since 1.9
 *
 *
 * @param string $url
 *
 * @return array
 */
function get_og_meta( $url ) {

	if ( $url ) {

		$html_content = get_content_from_url( $url );

		if ( $html_content ) {

			$data = array();

			$html = new DOMDocument();
			@$html->loadHTML( $html_content );

			$data['title']          = '';
			$data['description']    = '';
			$data['img']            = '';
			$data['start_datetime'] = '';
			$data['end_datetime']   = '';
			$i                      = 0;

			foreach ( $html->getElementsByTagName( 'meta' ) as $meta ) {

				if ( $meta->getAttribute( 'property' ) == 'og:title' ) {
					$data['title'] = $meta->getAttribute( 'content' );
				}

				if ( $meta->getAttribute( 'property' ) == 'og:description' ) {
					$data['description'] = $meta->getAttribute( 'content' );
				}

				if ( $meta->getAttribute( 'property' ) == 'og:image' ) {
					$data['img'][ $i ] = $meta->getAttribute( 'content' );
					$i ++;
				}

				if ( strpos( $url, 'eventbrite' ) !== false ) {
					if ( $meta->getAttribute( 'property' ) == 'event:start_time' ) {
						$data['start_datetime'] = $meta->getAttribute( 'content' );
					}
					if ( $meta->getAttribute( 'property' ) == 'event:end_time' ) {
						$data['end_datetime'] = $meta->getAttribute( 'content' );
					}
				}
			}

			if ( isset( $data['img'][0] ) == false ) {
				$meta_og_img[0] = '';
			}

			return $data;
		}
	}

	return false;
}
