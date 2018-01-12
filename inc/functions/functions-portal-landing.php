<?php
/**
 * Portal landing
 */

function portal_landing_meta_boxes() {

	$descUrl = 'Enter the URL from the page you want to link to. This will automatically pull in the title and image (press preview to view).';
	$descExpire = 'If expire date and time set the card will expire at this specified time and fallback content will be displayed. Date format yyyy-mm-ddThh:mm.';
	$descFallback = 'This feature is only in use if an expire date/time is selected. ‘What’s On’ is a static card. ‘Latest news/blog’ will display the most recently published content.';
	$descCardTitle = 'Only enter substitute text here when you need to override the automated title.';
	$descCardImage = 'If you need to override the automated image, paste the image URL here after uploading it to the image library. Image size 768px x 576px.';

	$home_meta_boxes = array(
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
		),
		array(
			'id' => 'home_card_1',
			'title' => 'Homepage card 1 - top left position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_1',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_1',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_1',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_1',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Event date/time',
					'desc' => '',
					'id' => 'home_card_date_1',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Expire date/time',
					'desc' => $descExpire,
					'id' => 'home_card_expire_1',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_1',
					'type' => 'select',
					'options' => array('What’s on', 'Latest news', 'Latest blog post')
				)
			)
		),
		array(
			'id' => 'home_card_2',
			'title' => 'Homepage card 2 - top middle position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_2',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_2',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_2',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_2',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Event date/time',
					'desc' => '',
					'id' => 'home_card_date_2',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Expire date/time',
					'desc' => $descExpire,
					'id' => 'home_card_expire_2',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_2',
					'type' => 'select',
					'options' => array('What’s on', 'Latest news', 'Latest blog post')
				)
			)
		),
		array(
			'id' => 'home_card_3',
			'title' => 'Homepage card 3 - top right position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_3',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_3',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_3',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_3',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Event date/time',
					'desc' => '',
					'id' => 'home_card_date_3',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Expire date/time',
					'desc' => $descExpire,
					'id' => 'home_card_expire_3',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_3',
					'type' => 'select',
					'options' => array('What’s on', 'Latest news', 'Latest blog post')
				)
			)
		),
		array(
			'id' => 'home_card_4',
			'title' => 'Homepage card 4 - bottom left position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_4',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_4',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_4',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_4',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Event date/time',
					'desc' => '',
					'id' => 'home_card_date_4',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Expire date/time',
					'desc' => $descExpire,
					'id' => 'home_card_expire_4',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_4',
					'type' => 'select',
					'options' => array('What’s on', 'Latest news', 'Latest blog post')
				)
			)
		),
		array(
			'id' => 'home_card_5',
			'title' => 'Homepage card 5 - bottom middle position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_5',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_5',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_5',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_5',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Event date/time',
					'desc' => '',
					'id' => 'home_card_date_5',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Expire date/time',
					'desc' => $descExpire,
					'id' => 'home_card_expire_5',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_5',
					'type' => 'select',
					'options' => array('What’s on', 'Latest news', 'Latest blog post')
				)
			)
		),
		array(
			'id' => 'home_card_6',
			'title' => 'Homepage card 6 - bottom right position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_6',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_6',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_6',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_6',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Event date/time',
					'desc' => '',
					'id' => 'home_card_date_6',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Expire date/time',
					'desc' => $descExpire,
					'id' => 'home_card_expire_6',
					'type' => 'datetime',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_6',
					'type' => 'select',
					'options' => array('What’s on', 'Latest news', 'Latest blog post')
				)
			)
		)
	);

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

	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	if( $template_file == 'page-portal-landing.php' ) {
		foreach ( $home_meta_boxes as $meta_box ) {
			$home_box = new CreateMetaBox( $meta_box );
		}
	}
}

class get_og_meta {

	/**
	 * @param $result
	 *
	 * @return bool
	 */
	public function check( $result ) {

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
	public function content( $url ) {

		if ( ! class_exists( 'WP_Http' ) ) {
			include_once( ABSPATH . WPINC . '/class-http.php' );
		}

		$request = new WP_Http;
		$result  = $request->request( $url );

		if ( $this->check( $result ) ) {
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
	public function meta_og_data( $url ) {

		if ( $url ) {

			$html_content = $this->content( $url );

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

	function get_data_on_save( $post_id ) {

		$template_file = get_post_meta( $post_id, '_wp_page_template', true );

		if ( $template_file == 'page-home.php' ) {

			$data = $_POST;

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

						$og = $this->meta_og_data( $data[ 'home_card_url_' . $i ] );

						if ( trim( $data[ 'home_card_title_' . $i ] ) == '' ) {
							$_POST[ 'home_card_title_' . $i ] = esc_attr( $og['title'] );
						}
						if ( trim( $data[ 'home_card_excerpt_' . $i ] ) == '' ) {
							$_POST[ 'home_card_excerpt_' . $i ] = esc_attr( $og['description'] );
						}
						if ( trim( $data[ 'home_card_img_' . $i ] ) == '' ) {
							$_POST[ 'home_card_img_' . $i ] = esc_attr( $og['img'][0] );
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
}
