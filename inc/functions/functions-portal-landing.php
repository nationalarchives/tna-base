<?php
/**
 * Portal landing
 */

function portal_landing_meta_boxes() {

	if (isset($_GET['post'])) {
		$post_id = $_GET['post'];
	} else {
		if (isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		} else {
			$post_id = '';
		}
	}
	if( !isset( $post_id ) ) return;

	$descUrl = 'Enter the URL from the page you want to link to. This will automatically populate the fields on page update.';
	$descExpire = 'If expire date and time set the card will expire at this specified time and fallback content will be displayed. Date format yyyy-mm-ddThh:mm.';
	$descCardTitle = 'Only enter substitute text here when you need to override the automated title.';
	$descCardImage = 'If you need to override the automated image, paste the image URL here after uploading it to the image library. Image size 768px x 576px.';

	$portal_meta_boxes = array(
		array(
			'id' => 'page_options',
			'title' => 'Page options',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Introduction image',
					'desc' => '',
					'id' => 'intro_img',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Facebook link',
					'desc' => '',
					'id' => 'facebook_link',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Twitter link',
					'desc' => '',
					'id' => 'twitter_link',
					'type' => 'text',
					'std' => ''
				)
			)
		)
	);

	for ( $i = 0; $i <= 6; $i ++ ) {
		if ($i==0) {
			$banner = 'Banner ';
			$n = '';
		} else {
			$banner = '';
			$n = $i;
		}
		$portal_meta_boxes[] =
			array(
				'id'       => 'portal_card_'.$i,
				'title'    => $banner.'Card '.$n,
				'pages'    => 'page',
				'context'  => 'normal',
				'priority' => 'high',
				'fields'   => array(
					array(
						'name' => 'Content URL*',
						'desc' => $descUrl,
						'id'   => 'portal_card_url_'.$i,
						'type' => 'text',
						'std'  => ''
					),
					array(
						'name' => 'Title',
						'desc' => $descCardTitle,
						'id'   => 'portal_card_title_'.$i,
						'type' => 'text',
						'std'  => ''
					),
					array(
						'name' => 'Excerpt',
						'desc' => '',
						'id'   => 'portal_card_excerpt_'.$i,
						'type' => 'textarea',
						'std'  => ''
					),
					array(
						'name' => 'Image',
						'desc' => $descCardImage,
						'id'   => 'portal_card_img_'.$i,
						'type' => 'media',
						'std'  => ''
					),
					array(
						'name' => 'Event date/time',
						'desc' => '',
						'id'   => 'portal_card_date_'.$i,
						'type' => 'datetime',
						'std'  => ''
					)
				)
		);
	}

	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	if( $template_file == 'page-portal-landing.php' ) {
		foreach ( $portal_meta_boxes as $meta_box ) {
			$box = new CreateMetaBox( $meta_box );
		}
	}
}

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
 * @since 1.0
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
 * @since 1.0
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

function portal_landing_get_og_meta_on_save( $post_id ) {

	$template_file = get_post_meta( $post_id, '_wp_page_template', true );

	if ( $template_file == 'page-portal-landing.php' ) {

		$data = $_POST;

		for ( $i = 0; $i <= 6; $i ++ ) {

			if ( $data[ 'portal_card_url_' . $i ] ) {

				$current = get_post_meta( $post_id, 'portal_card_url_old_' . $i, true );

				// If new URL doesn't match the previous URL clear all fields
				if ( $current ) {
					if ( $data[ 'portal_card_url_' . $i ] !== $current ) {
						$data[ 'portal_card_title_' . $i ]   = '';
						$data[ 'portal_card_excerpt_' . $i ] = '';
						$data[ 'portal_card_img_' . $i ]     = '';
						$data[ 'portal_card_date_' . $i ]    = '';
						update_post_meta( $post_id, 'portal_card_url_old_' . $i, $data[ 'portal_card_url_' . $i ] );
					}
				} else {
					add_post_meta( $post_id, 'portal_card_url_old_' . $i, $data[ 'portal_card_url_' . $i ], true );
				}

				// If any of the fields are empty get OG meta data to populate
				if ( trim( $data[ 'portal_card_title_' . $i ] ) == '' ||
				     trim( $data[ 'portal_card_excerpt_' . $i ] ) == '' ||
				     trim( $data[ 'portal_card_img_' . $i ] ) == '' ||
				     trim( $data[ 'portal_card_date_' . $i ] ) == ''
				) {

					$og = get_og_meta( $data[ 'portal_card_url_' . $i ] );

					if ( trim( $data[ 'portal_card_title_' . $i ] ) == '' ) {
						$_POST[ 'portal_card_title_' . $i ] = esc_attr( $og['title'] );
					}
					if ( trim( $data[ 'portal_card_excerpt_' . $i ] ) == '' ) {
						$_POST[ 'portal_card_excerpt_' . $i ] = esc_attr( $og['description'] );
					}
					if ( trim( $data[ 'portal_card_img_' . $i ] ) == '' ) {
						$_POST[ 'portal_card_img_' . $i ] = esc_attr( $og['img'][0] );
					}
					if ( strpos( $data[ 'portal_card_url_' . $i ], 'eventbrite' ) !== false ) {
						if ( trim( $data[ 'portal_card_date_' . $i ] ) == '' ) {
							$date = esc_attr( $og['start_datetime'] );
							$date = date( 'Y-m-d\TH:i', strtotime( $date ) );
							$_POST[ 'portal_card_date_' . $i ] = $date;
						}
					} else {
						$_POST[ 'portal_card_date_' . $i ] = $data[ 'portal_card_date_' . $i ];
					}
				}
			}
		}
	}
}


