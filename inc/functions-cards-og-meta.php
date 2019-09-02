<?php
/**
 * @param $result
 *
 * @return bool
 */
function check_result( $result ) {

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
 * @since 1.0
 *
 * @param string $url
 *
 * @return string
 */
function get_html_content( $url ) {

	if ( ! class_exists( 'WP_Http' ) ) {
		include_once( ABSPATH . WPINC . '/class-http.php' );
	}

	$request = new WP_Http;
	$result  = $request->request( $url );

	if ( check_result( $result ) ) {
		$content = $result['body'];
	} else {
		$content = null;
	}

	return $content;
}

/**
 * Extracts the OG meta data.
 *
 * @since 1.0
 *
 *
 * @param string $url
 *
 * @return array
 */
function get_meta_og_data( $url ) {

	if ( $url ) {

		$html_content = get_html_content( $url );

		if ( $html_content ) {

			$data = array();

			$html = new DOMDocument();
			@$html->loadHTML( $html_content );

			$data['title']          = '';
			$data['description']    = '';
			$data['img']            = '';
			$data['start_datetime'] = '';
			$data['end_datetime']   = '';

			foreach ( $html->getElementsByTagName( 'meta' ) as $meta ) {

				if ( $meta->getAttribute( 'property' ) == 'og:title' ) {
					$data['title'] = $meta->getAttribute( 'content' );
				}

				if ( $meta->getAttribute( 'property' ) == 'og:description' ) {
					$data['description'] = $meta->getAttribute( 'content' );
				}

				if ( $meta->getAttribute( 'property' ) == 'og:image' ) {
					$data['img'] = $meta->getAttribute( 'content' );
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

function get_meta_og_on_save( $post_id ) {

	$template_file = get_post_meta( $post_id, '_wp_page_template', true );

	if ( $template_file == 'page-home.php' ) {

		$data = $_POST;

		if ( $data['home_banner_url'] ) {

			$current = get_post_meta( $post_id, 'home_banner_url_old', true );

			if ( $current ) {
				if ( $data['home_banner_url'] !== $current ) {
					$data['home_banner_title']   = '';
					$data['home_banner_excerpt'] = '';
					$data['home_banner_img']     = '';
					$data['home_banner_date']    = '';
					$data['home_banner_expire']  = '';
					update_post_meta( $post_id, 'home_banner_url_old', $data['home_banner_url'] );
				}
			} else {
				add_post_meta( $post_id, 'home_banner_url_old', $data['home_banner_url'], true );
			}

			$og = get_meta_og_data( $data['home_banner_url'] );

			if ( trim( $data['home_banner_title'] ) == '' ) {
				$_POST['home_banner_title'] = esc_attr( $og['title'] );
			}
			if ( trim( $data['home_banner_excerpt'] ) == '' ) {
				$_POST['home_banner_excerpt'] = esc_attr( $og['description'] );
			}
			if ( trim( $data['home_banner_img'] ) == '' ) {
				$_POST['home_banner_img'] = esc_attr( $og['img'][0] );
			}
			if ( strpos( $data['home_banner_url'], 'eventbrite' ) !== false ) {
				if ( trim( $data['home_banner_date'] ) == '' ) {
					$date = esc_attr( $og['start_datetime'] );
					$date = date( 'Y-m-d\TH:i', strtotime( $date ) );
					$_POST['home_banner_date'] = $date;
				}
				if ( trim( $data['home_banner_expire'] ) == '' ) {
					$date = esc_attr( $og['end_datetime'] );
					$date = date( 'Y-m-d\TH:i', strtotime( $date ) );
					$_POST['home_banner_expire'] = $date;
				}
			} else {
				$_POST['home_banner_date'] = $data['home_banner_date'];
				$_POST['home_banner_expire'] = $data['home_banner_expire'];
			}
		}

		for ( $i = 1; $i <= 6; $i ++ ) {

			if ( $data[ 'home_card_url_' . $i ] ) {

				$current = get_post_meta( $post_id, 'home_card_url_old_' . $i, true );

				if ( $current ) {
					if ( $data[ 'home_card_url_' . $i ] !== $current ) {
						$data[ 'home_card_title_' . $i ]   = '';
						$data[ 'home_card_excerpt_' . $i ] = '';
						$data[ 'home_card_img_' . $i ]     = '';
						$data[ 'home_card_date_' . $i ]    = '';
						$data[ 'home_card_expire_' . $i ]  = '';
						update_post_meta( $post_id, 'home_card_url_old_' . $i, $data[ 'home_card_url_' . $i ] );
					}
				} else {
					add_post_meta( $post_id, 'home_card_url_old_' . $i, $data[ 'home_card_url_' . $i ], true );
				}

				if ( trim( $data[ 'home_card_title_' . $i ] ) == '' ||
				     trim( $data[ 'home_card_excerpt_' . $i ] ) == '' ||
				     trim( $data[ 'home_card_img_' . $i ] ) == '' ||
				     trim( $data[ 'home_card_date_' . $i ] ) == '' ||
				     trim( $data[ 'home_card_expire_' . $i ] ) == ''
				) {

					$og = get_meta_og_data( $data[ 'home_card_url_' . $i ] );

					if ( trim( $data[ 'home_card_title_' . $i ] ) == '' ) {
						$_POST[ 'home_card_title_' . $i ] = esc_attr( $og['title'] );
					}
					if ( trim( $data[ 'home_card_excerpt_' . $i ] ) == '' ) {
						$_POST[ 'home_card_excerpt_' . $i ] = esc_attr( $og['description'] );
					}
					if ( trim( $data[ 'home_card_img_' . $i ] ) == '' ) {
						$_POST[ 'home_card_img_' . $i ] = esc_attr( $og['img'] );
					}
					if ( strpos( $data[ 'home_card_url_' . $i ], 'eventbrite' ) !== false ) {
						if ( trim( $data[ 'home_card_date_' . $i ] ) == '' ) {
							$date = esc_attr( $og['start_datetime'] );
							$date = date( 'Y-m-d\TH:i', strtotime( $date ) );
							$_POST[ 'home_card_date_' . $i ] = $date;
						}
						if ( trim( $data[ 'home_card_expire_' . $i ] ) == '' ) {
							$date = esc_attr( $og['end_datetime'] );
							$date = date( 'Y-m-d\TH:i', strtotime( $date ) );
							$_POST[ 'home_card_expire_' . $i ] = $date;
						}
					} else {
						$_POST[ 'home_card_date_' . $i ] = $data[ 'home_card_date_' . $i ];
						$_POST[ 'home_card_expire_' . $i ] = $data[ 'home_card_expire_' . $i ];
					}
				}
			}
		}
	}
}
