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
	$descDate = 'Please use this date format if dropdown selector isn\'t available, yyyy-mm-ddThh:mm.';
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
					'name' => 'Logo',
					'desc' => '',
					'id' => 'portal_logo',
					'type' => 'media',
					'std' => ''
				),
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
						'desc' => $descDate,
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

function display_portal_card( $i, $url, $title, $excerpt, $image, $date ) {

	if ( $url ) {

		if ( str_word_count( $excerpt, 0 ) > 14 ) {
			$explode_words = explode( ' ', $excerpt );
			$excerpt       = implode( ' ', array_splice( $explode_words, 0, 14 ) ) . '...';
		}

		if ( strpos( $url, 'nationalarchives.gov.uk/about/news/' ) !== false ) {
			$type = 'News';
		} elseif ( strpos( $url, 'blog.nationalarchives.gov.uk' ) !== false ) {
			$type = 'Blog';
		} elseif ( strpos( $url, 'media.nationalarchives.gov.uk' ) !== false ) {
			$type = 'Multimedia';
		} elseif ( strpos( $url, 'eventbrite' ) !== false ) {
			$type = 'Event';
		} else {
			$type = 'Featured';
		}

		if ( $date && $type == 'Event' ) {
			date_default_timezone_set( 'Europe/London' );
			$date      = date( 'l j F Y, H:i', strtotime( $date ) );
			$date_html = '<div class="entry-date"><div class="date">' . $date . '</div></div>';
		} else {
			$date_html = '';
		}

		if ( $i == 0 ) {
			$col_class = 'col-card-12';
			$card_class = 'card hero-banner';
		} else {
			$col_class = 'col-card-4';
			$card_class = 'card';
		}

		$html = '<div class="%s"><div class="%s">
					<a id="card-%s" href="%s" class="portal-card">
						<div class="entry-image" style="background-image: url(%s)"></div>
						<div class="entry-content %s">
							<div class="content-type">%s</div>
							<h3>%s</h3>
							<p>%s</p>
						</div>
						%s
					</a>
				</div></div>';

		return sprintf( $html,
			$col_class,
			$card_class,
			$i,
			$url,
			$image,
			$type,
			$type,
			$title,
			$excerpt,
			$date_html
		);
	}
}
