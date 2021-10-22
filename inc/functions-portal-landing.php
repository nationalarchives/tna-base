<?php
/**
 * Portal landing
 */


/**
 * Adds custom fields (metaboxes) to page-portal-landing.php
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
	$descExpire = 'If a date and time set the card will expire at this specified time. Please use this date format if dropdown selector isn\'t available, yyyy-mm-ddThh:mm.';

	$portal_meta_boxes = array(
		array(
			'id' => 'page_options',
			'title' => 'Page options',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Masthead logo',
					'desc' => 'Logo appears over the masthead image and above the H1.',
					'id' => 'portal_logo',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Introduction image',
					'desc' => 'Image appears right of the introduction text.',
					'id' => 'intro_img',
					'type' => 'media',
					'std' => ''
				),
                array(
                    'name' => 'Portal background theme colour',
                    'desc' => 'Hex value. Default: #EEEEEE.',
                    'id'   => 'portal_theme_colour',
                    'type' => 'text',
                    'std'  => ''
                ),
				array(
					'name' => 'Stay up-to-date bar',
					'desc' => '',
					'id' => 'stay_up_to_date',
					'type' => 'select',
					'options' => array('Top location', 'Bottom location', 'Hide')
				),
                array(
                    'name' => 'Stay up-to-date bar title',
                    'desc' => 'Default: Stay up-to-date with all our activity.',
                    'id' => 'stay_up_to_date_content',
                    'type' => 'text',
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
				),
                array(
                    'name' => 'Instagram link',
                    'desc' => '',
                    'id' => 'instagram_link',
                    'type' => 'text',
                    'std' => ''
                ),
				array(
					'name' => 'Newsletter anchor link',
					'desc' => '',
					'id' => 'newsletter_link',
					'type' => 'select',
					'options' => array('Disable', 'Enable')
				)
			)
		),
        array(
            'id' => 'feature_banner_options',
            'title' => 'Feature banner options',
            'pages' => 'page',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Feature banner below introduction',
                    'desc' => '',
                    'id' => 'feature_banner',
                    'type' => 'select',
                    'options' => array('Disable', 'Enable')
                ),
                array(
                    'name' => 'Feature banner body',
                    'desc' => '',
                    'id'   => 'feature_banner_body',
                    'type' => 'textarea',
                    'std'  => ''
                ),
                array(
                    'name' => 'Feature banner body image',
                    'desc' => '',
                    'id' => 'feature_banner_body_img',
                    'type' => 'media',
                    'std' => ''
                ),
                array(
                    'name' => 'Feature banner body image alt text',
                    'desc' => '',
                    'id' => 'feature_banner_body_img_alt',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => 'Feature banner background image',
                    'desc' => '',
                    'id' => 'feature_banner_background_img',
                    'type' => 'media',
                    'std' => ''
                )
            )
        )
	);

	for ( $i = 0; $i <= 9; $i ++ ) {

		$portal_meta_boxes[] =
			array(
				'id'       => 'portal_card_'.$i,
				'title'    => 'Card '.($i+1),
				'pages'    => 'page',
				'context'  => 'normal',
				'priority' => 'high',
				'fields'   => array(
                    array(
                        'name' => 'Section heading',
                        'desc' => 'This heading will appear above this card as a section divider.',
                        'id'   => 'portal_card_section_heading_'.$i,
                        'type' => 'text',
                        'std'  => ''
                    ),
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
						'name' => 'Card label',
						'desc' => 'Auto will select an appropriate card label.',
						'id' => 'portal_card_label_'.$i,
						'type' => 'select',
						'options' => array('Auto', 'About', 'Audio', 'Blog', 'Bookshop', 'Careers', 'Case study', 'Collaboration', 'Event', 'Feature', 'Guidance', 'Multimedia', 'News', 'Podcast', 'Project', 'Resource', 'Service', 'Study resource', 'Training', 'Video', 'Webinar')
					),
					array(
						'name' => 'Event date/time',
						'desc' => $descDate,
						'id'   => 'portal_card_date_'.$i,
						'type' => 'datetime',
						'std'  => ''
					),
					array(
						'name' => 'Expire date/time',
						'desc' => $descExpire,
						'id' => 'portal_card_expire_'.$i,
						'type' => 'datetime',
						'std' => ''
					)
				)
		);
	}

    $portal_meta_boxes[] =
        array(
            'id' => 'portal_link_card_options',
            'title' => 'Link Card Options',
            'pages' => 'page',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Display link cards',
                    'desc' => '',
                    'id' => 'display_link_cards',
                    'type' => 'select',
                    'options' => array('Disable', 'Enable')
                ),
                array(
                    'name' => 'Content',
                    'desc' => '[Child pages] will populate cards from child pages. [Custom cards] will populate from Link Card fields below.',
                    'id' => 'content_link_cards',
                    'type' => 'select',
                    'options' => array('Child pages', 'Custom cards')
                ),
                array(
                    'name' => 'Heading',
                    'desc' => '',
                    'id' => 'portal_link_card_section_heading',
                    'type' => 'text',
                    'std' => ''
                )
            )
        );

    for ( $i = 0; $i <= 5; $i ++ ) {

        $portal_meta_boxes[] =
            array(
                'id' => 'portal_link_card_' . $i,
                'title' => 'Link Card ' . ($i+1),
                'pages' => 'page',
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'name' => 'Title',
                        'desc' => '',
                        'id' => 'portal_link_card_title_' . $i,
                        'type' => 'text',
                        'std' => ''
                    ),
                    array(
                        'name' => 'URL',
                        'desc' => '',
                        'id' => 'portal_link_card_url_' . $i,
                        'type' => 'text',
                        'std' => ''
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
 * On page update gets og meta data via URL and saves to custom fields
 *
 * @param $post_id
 */
function portal_landing_get_og_meta_on_save( $post_id ) {

	$template_file = get_post_meta( $post_id, '_wp_page_template', true );

	if ( $template_file == 'page-portal-landing.php' ) {

		$data = $_POST;

		for ( $i = 0; $i <= 9; $i ++ ) {

			if ( $data[ 'portal_card_url_' . $i ] ) {

				$current    = get_post_meta( $post_id, 'portal_card_url_old_' . $i, true );

				if ( $current == '' ) {
					add_post_meta( $post_id, 'portal_card_url_old_' . $i, $data[ 'portal_card_url_' . $i ], true );
				}

				// If new URL doesn't match the previous URL clear all fields
				if ( $current !== $data[ 'portal_card_url_' . $i ] ) {
					$data[ 'portal_card_title_' . $i ]   = '';
					$data[ 'portal_card_excerpt_' . $i ] = '';
					$data[ 'portal_card_img_' . $i ]     = '';
					$data[ 'portal_card_label_' . $i ]   = 'Auto';
					$data[ 'portal_card_date_' . $i ]    = '';
					$data[ 'portal_card_expire_' . $i ]  = '';
					update_post_meta( $post_id, 'portal_card_url_old_' . $i, $data[ 'portal_card_url_' . $i ] );
				}

				// If any of the fields are empty get OG meta data to populate
				if ( trim( $data[ 'portal_card_title_' . $i ] ) == '' ||
				     trim( $data[ 'portal_card_excerpt_' . $i ] ) == '' ||
				     trim( $data[ 'portal_card_img_' . $i ] ) == '' ||
				     trim( $data[ 'portal_card_date_' . $i ] ) == '' ||
				     trim( $data[ 'portal_card_expire_' . $i ] ) == ''
				) {

					$og = get_og_meta( $data[ 'portal_card_url_' . $i ] );

					if ( trim( $data[ 'portal_card_title_' . $i ] ) == '' ) {
						$_POST[ 'portal_card_title_' . $i ] = esc_attr( $og['title'] );
					}
					if ( trim( $data[ 'portal_card_excerpt_' . $i ] ) == '' ) {
						$_POST[ 'portal_card_excerpt_' . $i ] = esc_attr( $og['description'] );
					}
					if ( trim( $data[ 'portal_card_img_' . $i ] ) == '' ) {
						$_POST[ 'portal_card_img_' . $i ] = esc_attr( $og['img']);
					}
					if ( strpos( $data[ 'portal_card_url_' . $i ], 'eventbrite' ) !== false ) {
						if ( trim( $data[ 'portal_card_date_' . $i ] ) == '' ) {
							$date = esc_attr( $og['start_datetime'] );
							$date = date( 'Y-m-d\TH:i', strtotime( $date ) );
							$_POST[ 'portal_card_date_' . $i ] = $date;
						}
						if ( trim( $data[ 'portal_card_expire_' . $i ] ) == '' ) {
							$date = esc_attr( $og['end_datetime'] );
							$date = date( 'Y-m-d\TH:i', strtotime( $date ) );
							$_POST[ 'portal_card_expire_' . $i ] = $date;
						}
					} else {
						$_POST[ 'portal_card_date_' . $i ] = $data[ 'portal_card_date_' . $i ];
					}
				}
			} else {
				$_POST[ 'portal_card_title_' . $i ]   = '';
				$_POST[ 'portal_card_excerpt_' . $i ] = '';
				$_POST[ 'portal_card_img_' . $i ]     = '';
				$_POST[ 'portal_card_label_' . $i ]    = 'Auto';
				$_POST[ 'portal_card_date_' . $i ]    = '';
				$_POST[ 'portal_card_expire_' . $i ]    = '';
			}
		}
	}
}

/**
 * Card labels
 *
 * @param $url
 * @param $label
 *
 * @return string
 */
function portal_card_label( $url, $label ) {
	if ( $label == 'Auto' ) {
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
	} else {
		$type = $label;
	}

	return $type;
}

/**
 * Formats and returns date
 *
 * @param $date
 * @param $type
 *
 * @return string
 */
function portal_card_date( $date, $type ) {
	if ( $date && $type == 'Event' ) {
		date_default_timezone_set( 'Europe/London' );
		$date      = date( 'l j F Y, H:i', strtotime( $date ) );
		$date_html = '<div class="entry-date"><div class="date">' . $date . '</div></div>';
	} else {
		$date_html = '';
	}

	return $date_html;
}

/**
 * Limits string to desired length. Default 14 words.
 *
 * @param $words
 * @param int $number
 *
 * @return string
 */
function portal_limit_words( $words, $number = 14 ) {
	if (str_word_count($words, 0) > $number) {
		$explode_words = explode( ' ', $words );
		$words = implode(' ', array_splice( $explode_words , 0, $number)) . '...';
	}
	return $words;
}

/**
 * Card html
 *
 * @param $i
 * @param $url
 * @param $title
 * @param $excerpt
 * @param $image
 * @param $date
 * @param $label
 *
 * @return string
 */
function portal_display_card( $i, $url, $title, $excerpt, $image, $date, $label ) {

	if ( $url ) {

		$type = portal_card_label( $url, $label );
		$date_html = portal_card_date( $date, $type );
		$target = ( $type == 'Event' ) ? ' target="_blank"' : '';
		$image = make_path_relative_no_pre_path( $image );

		if ( $i == 0 ) {
			$col_class = 'col-card-12';
			$card_class = 'card hero-banner';
			$excerpt = portal_limit_words( $excerpt, 40 );
		} else {
			$col_class = 'col-card-4';
			$card_class = 'card';
			$excerpt = portal_limit_words( $excerpt, 32 );
		}

		$html = '<div class="%s"><div class="%s">
					<a id="card-%s" href="%s" class="portal-card"%s>
						<div class="entry-image" style="background-image: url(%s)"></div>
						<div class="entry-content %s">
							<div class="content-type">%s</div>
							<h3>%s</h3>
							<p>%s</p>
						</div>%s
					</a>
				</div></div>';

		return sprintf( $html,
			$col_class,
			$card_class,
			$i,
			$url,
			$target,
			$image,
			strtolower($type),
			$type,
			$title,
			$excerpt,
			$date_html
		);
	}
}

function display_card_section_heading($heading, $theme_bg_color) {
    $background_color = '';
    $class = '';
    if (!empty($theme_bg_color))
    {
        $background_color = ' style="background-color: '. $theme_bg_color . ';"';
        $class = ' bg-color';
    }
    $html = '<div class="col-xs-12"><div class="card-section-heading%s"%s>
					<h3>%s</h3>
			</div></div>';

    return sprintf( $html, $class, $background_color, $heading );
}

function portal_display_feature_banner($bg_img, $bg_color, $body, $body_img) {
    $html = '<div class="feature-banner" %s>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="feature-banner-content" %s>
                            <div class="row">
                                <div class="col-sm-8">
                                    %s
                                </div>
                                <div class="col-sm-4">
                                    %s
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

    return sprintf( $html, $bg_img, $bg_color, $body, $body_img );
}

function portal_link_card($url, $title) {
    $html = '<div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="link-card">
                        <h4><a href="%s">%s</a></h4>
                    </div>
                </div>';

    return sprintf( $html, $url, $title );
}

function portal_display_link_cards($color, $title, $cards, $content_type) {

    $cards_html = '';
    if ($content_type == 'Custom cards')
    {
        foreach ($cards as $c) {
            $cards_html .= portal_link_card($c['url'], $c['title']);
        }
    } else {
        Global $post;
        $children = get_pages('child_of='.$post->ID.'&sort_column=menu_order');
        if (isset($children) && count($children) > 0)
        {
            foreach ($children as $child)
            {
                $cards_html .= portal_link_card(esc_url( get_page_link( $child->ID ) ), $child->post_title);
            }
        }
    }

    $html = '<div class="link-cards" %s>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="link-cards-content">
                        <div class="row">
                                <div class="col-md-12">
                                    <h3>%s</h3>
                                </div>
                            </div>
                            <div class="row">
                                %s
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

    return sprintf( $html, $color, $title, $cards_html );
}

/**
 * Stay up-to-date bar html
 *
 * @param string $facebook
 * @param string $twitter
 * @param string $insatgram
 * @param string $newsletter
 * @param string $theme_bg_color
 * @param string $text
 * @return string
 */
function portal_connect_bar( $facebook='', $twitter='', $insatgram='', $newsletter='', $theme_bg_color='', $text='' ) {

    if (!empty($facebook) || !empty($twitter) || !empty($insatgram)) {
        if ( $facebook ) {
            $facebook = '<a href="'.$facebook.'" title="Follow us on Facebook" target="_blank" rel="noopener noreferrer"><div class="icon-circle icon-facebook icon-size-26"></div></a>';
        }
        if ( $twitter ) {
            $twitter = '<a href="'.$twitter.'" title="Follow us on Twitter" target="_blank" rel="noopener noreferrer"><div class="icon-circle icon-twitter icon-size-26"></div></a>';
        }
        if ( $insatgram ) {
            $insatgram = '<a href="'.$insatgram.'" title="Follow us on Instagram" target="_blank" rel="noopener noreferrer"><div class="icon-circle icon-instgram icon-size-26"></div></a>';
        }
        if ( $newsletter=='Enable' ) {
            $newsletter = '<a href="#newsletterAccessibility" title="Send me The National Archives’ newsletter" rel="noopener noreferrer" class="anchor-link"><div class="icon-circle icon-envelope icon-size-26"></div></a>';
        } else {
            $newsletter = '';
        }

        $background_color = '';
        if (!empty($theme_bg_color))
        {
            $background_color = ' style="background-color: '. $theme_bg_color . ';"';
        }
        if (!empty($text))
        {
            $title = $text;
        } else {
            $title = 'Stay up-to-date with all our activity';
        }

        $html =     '<div class="stay-up-to-date-bar"'.$background_color.'>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="text-center">
									<span class="h4">'.$title.'</span> '
            .$facebook.$twitter.$insatgram.$newsletter.
            '</div>
							</div>
						</div>
					</div>
				</div>';

        return $html;
    }
}

/**
 * Portal branding
 *
 * @param $logo
 * @param $title
 *
 * @return string
 */
function portal_brand( $logo, $title ) {

	if ( $logo ) {
		$html = '<div class="portal-logo">
					<img src="' . $logo . '" alt="' . $title . '" class="img-responsive">
				</div>';

		return $html;
	}
}

/**
 * Fallback card html
 *
 * @param $i
 *
 * @return string
 */
function portal_fallback_card( $i ) {

	if ( $i != 0 ) {

		$url = 'https://www.nationalarchives.gov.uk/about/visit-us/whats-on/events/';
		$image = make_path_relative_no_pre_path( get_template_directory_uri().'/img/events.jpg' );

		$html = '<div class="col-md-4"><div class="card fallback">
					<a id="card-%s" href="%s" class="portal-card">
						<div class="entry-image" style="background-image: url(%s)">
						    <div class="content-type">Event</div>
                        </div>
						<div class="entry-content event">
							<h3>Events - The National Archives</h3>
							<p>Find more information about our events programme and how to book tickets.</p>
						</div>
					</a>
				</div></div>';

		return sprintf( $html,
			$i,
			$url,
			$image
		);
	}
}

/**
 * Validates date
 *
 * @param $date
 *
 * @return bool
 */
function portal_validate_date( $date ) {
	// expected format Y-m-d\TH:i
	if (preg_match('/^\d{4}-\d{2}\-\d{2}T\d{2}:\d{2}/', $date)) { // Is in correct format
		return ((bool)strtotime($date)); // Is a valid date
	}
	return false;
}

/**
 * Checks if the card has expired
 *
 * @param $expire
 *
 * @return bool
 */
function portal_is_card_active( $expire ) {
	date_default_timezone_set('Europe/London');
	if ( portal_validate_date($expire) ) {
		$expire_date = strtotime($expire);
		$current_date = strtotime( date('Y-m-d H:i:s') );
		if ( $current_date <= $expire_date ) {
			return true;
		} else {
			return false;
		}
	} else {
		return true;
	}
}
