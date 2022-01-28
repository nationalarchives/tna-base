<?php

/**
 * Returns HTML markup for a card.
 *
 * @since 1.0
 *
 * @see card_html
 *
 * @param string $args
 * @return string
 */
function display_card( $args = '' ) {

    $defaults = array(
            'id'            => 0,
            'url'           => '',
            'title'         => '',
            'description'   => '',
            'image'         => '',
            'author'        => '',
            'pub_date'      => '',
            'event_date'    => '',
            'label'         => ''
    );

    $r = wp_parse_args( $args, $defaults );

    if ( $r['url'] ) {

	if ( !strpos($r['url'] , 'koha' ) ) {
            if ( !url_exists( $r['url']) ) {
                // ext URL return 404
                return card_fallback( '', $r['id'] );
            }
	}

        if ( $r['label'] == '' || $r['label'] == 'Auto' ) {
            $label = content_type( $r['url'] );
        } else {
            $label = $r['label'];
        }

        $image = make_url_https( $r['image'] );
        $image = rm_livelb( $image );

        $description = clean_excerpt( $r['description'] );
        $description = limit_words( $description );

        return card_html( $r['id'], $r['url'], $image, $label, $r['title'], $description, $r['pub_date'], $r['event_date'] );
    }
}

/**
 * Returns HTML markup for the cards.
 *
 * @since 1.0
 *
 * @see card_html
 *
 * @param string $id
 * @param string $url
 * @param string $image
 * @param string $label
 * @param string $title
 * @param string $description
 * @param string $pub_date
 * @param string $event_date
 * @return string
 */
function card_html( $id, $url, $image, $label, $title, $description, $pub_date, $event_date ) {

    $type = strtolower($label);
    $type_id = str_replace( ' ', '_', $type );
    $type_class = str_replace( ' ', '-', $type );
    $sr_span = '';
    $ext_icon = '';
    if ( $event_date ) {
        $sr_span = '<span class="sr-only">Opens a new window</span>';
        $ext_icon = ' class="externals"';
    }

    $html  = '<div class="col-md-4"><div class="card">';
    $html .= '<a ' . card_link_atts( $id, $url, $type_id, $type_class, $title ) . '>';
    $html .= card_image( $image, $label );
    $html .= '<div class="entry-content">';
    $html .= '<h3'.$ext_icon.'>' . $title . $sr_span . '</h3>';
    $html .= card_pub_date( $pub_date );
    $html .= '<p>' . $description . '</p>';
    $html .= card_event_date( $event_date, $label );
    $html .= '</div>';
    $html .= '</a>';
    $html .= '</div></div>';

    return $html;
}

/**
 * @param $id
 * @param $url
 * @param $type_id
 * @param $type_class
 * @param $title
 * @return string
 */
function card_link_atts( $id, $url, $type_id, $type_class, $title ) {

    if ( $type_id == 'event' ) {
        $target = 'target="_blank" title="Opens in a new window"';
    } else {
        $target = '';
    }

    $atts = 'id="card_%s" href="%s" %s data-gtm-name="%s" data-gtm-id="card_%s" data-gtm-position="card_position_%s" data-gtm-creative="card_type_%s" class="content-card %s"';

    return sprintf( $atts, $id, $url, $target, $title, $id, $id, $type_id, $type_class );
}

/**
 * @param $image
 * @param $type
 * @return string
 */
function card_image( $image, $type ) {

    if ( $type == 'Please select a label' || $type == '' ) {
        $type = '';
    } else {
        $type = '<div class="content-type">'.$type.'</div>';
    }

	$html = '<div class="entry-image" style="background-image: url(%s)">%s</div>';

	return sprintf( $html, $image, $type );
}

/**
 * @param $date
 * @param $type
 * @return string
 */
function card_event_date( $date, $type ) {

	if ( $date && $type == 'Event' ) {

		date_default_timezone_set('Europe/London');

		$date = date('l j F Y, H:i', strtotime( $date ));

		$html = '<div class="entry-date"><div class="date">%s</div></div>';

		return sprintf( $html, $date );
	}
}

/**
 * @param $date
 * @return string
 */
function card_pub_date( $date ) {

    if ( $date ) {

        $html = '<p class="entry-pub-date">%s</p>';

        return sprintf( $html, $date );
    }
}

/**
 * @param $type
 * @param $title
 * @param $description
 * @return string
 */
function banner_content( $type, $title, $description ) {

	$type_class = strtolower( $type );

	$html = '<div class="entry-content %s"><div class="content-type">%s</div><h3>%s</h3><p>%s</p></div>';

	return sprintf( $html, $type_class, $type, $title, $description );
}

/**
 * @param $words
 * @param int $number
 *
 * @return string
 */
function limit_words( $words, $number = 14 ) {

    $words = strip_tags($words);
    $words = trim($words);

    if (str_word_count($words, 0) > $number) {
        $explode_words = explode( ' ', $words );
        $words = implode(' ', array_splice( $explode_words , 0, $number)).'...';
    }

    return $words;
}

/**
 * @param $url
 *
 * @return bool
 */
function url_exists( $url ) {

    if ( strpos($url, 'nationalarchives.gov.uk') == false ) {
        $response = wp_remote_get( $url );
        $response_code = wp_remote_retrieve_response_code( $response );

        if ( $response_code  == '404' || $response_code == null ) {
            return false;
        } else {
            return true;
        }
    }
    return true;
}

/**
 * Removes internal URLs
 *
 * @param $url
 * @return string
 */
function rm_livelb( $url ) {

    if ( strpos($url, 'livelb.nationalarchives.gov.uk') !== false ) {

        $url = strstr( $url, '/wp-content' );

    } elseif ( strpos($url, 'testlb.nationalarchives.gov.uk') !== false ) {

        $url = strstr( $url, '/wp-content' );

    }

    return $url;
}

/**
 * Returns content type based on URL.
 *
 * @since 1.0
 *
 * @param string $url
 * @return string
 */
function content_type( $url ) {

    $content_type = "Feature";

    if (strpos($url, 'nationalarchives.gov.uk/about/news/') !== false) {

        $content_type = 'News';
    }
    elseif (strpos($url, 'blog.nationalarchives.gov.uk') !== false) {

        $content_type = 'Blog';
    }
    elseif (strpos($url, 'media.nationalarchives.gov.uk') !== false) {

        $content_type = 'Multimedia';
    }
    elseif (strpos($url, 'eventbrite') !== false) {

        $content_type = 'Event';
    }
    return $content_type;
}

/**
 * @param $excerpt
 * @return string
 */
function clean_excerpt($excerpt ) {

    $text = strip_tags($excerpt, '<strong><em>');

    return $text;
}

/**
 * @param $date
 *
 * @return bool
 */
function validate_date( $date ) {

    // expected format Y-m-d\TH:i
    if (preg_match('/^\d{4}-\d{2}\-\d{2}T\d{2}:\d{2}/', $date)) { // Is in correct format
        return ((bool)strtotime($date)); // Is a valid date
    }
    return false;
}

/**
 * Checks if the card has expired based on date input.
 *
 * @since 1.0
 *
 * @param string $expire
 * @return bool
 */
function is_card_active( $expire ) {

    date_default_timezone_set('Europe/London');

    if ( validate_date($expire) ) {

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

/**
 * Displays a fallback card based on type. Default generic events fallback card.
 *
 * @since 1.0
 *
 * @see card_html
 *
 * @param string $fallback
 * @param string $id
 * @return string
 */
function card_fallback( $fallback, $id ) {

    $url = 'https://www.nationalarchives.gov.uk/about/visit-us/whats-on/events/';
    $image = make_path_relative_no_pre_path( get_template_directory_uri().'/img/events.jpg' );
    $type = 'Events';
    $title = 'Events at The National Archives';
    $description = 'Find more information about our events programme and how to book tickets.';

    if ( $fallback == 'Latest news' ) {

        $rss = get_html_content( 'https://www.nationalarchives.gov.uk/category/news/feed/' );

        if ( $rss ) {

            $content = new SimpleXmlElement( $rss );

            $url         = str_replace( 'livelb', 'www', $content->channel->item[0]->link );
            $image       = str_replace( 'livelb', 'www', $content->channel->item[0]->enclosure['url'] );
            $type        = 'News';
            $title       = $content->channel->item[0]->title;
            $description = $content->channel->item[0]->description;
        }

    }
    if ( $fallback == 'Latest blog post' ) {

        $rss = get_html_content( 'https://blog.nationalarchives.gov.uk/feed/' );

        if ( $rss ) {

            $content = new SimpleXmlElement( $rss );

            $url = str_replace('livelb', 'www', $content->channel->item[0]->link);
            $image = str_replace('livelb', 'www', $content->channel->item[0]->enclosure['url']);
            $type = 'Blog';
            $title = $content->channel->item[0]->title;
            $description = $content->channel->item[0]->description;

        }
    }

    return card_html( $id, $url, $image, $type, $title, $description, '', '' );
}

function check_card_labels($post_id) {

    if (wp_is_post_revision($post_id)) {
        return;
    }

    if( isset($_POST['card_level_one_title_1']) ) {

        for ( $i = 1; $i <= 12; $i ++ ) {

            if ( isset( $_POST['card_level_one_title_'.$i] ) ) {
                if ( $_POST['card_level_one_title_'.$i] != '' ) {

                    $label = $_POST[ 'card_level_one_label_'.$i ];

                    if ( $label == 'Please select a label' ) {
                        set_transient( get_current_user_id() . 'level_one_card_error', 'Error! Please ensure you have selected a label for all cards.' );
                    }
                }
            }
        }
    }
}

function level_one_card_error() {
    $error = get_transient( get_current_user_id().'level_one_card_error' );
    if ( $error ) {
        ?>
        <div class="error notice">
            <p><?php _e( $error ); ?></p>
        </div>
        <?php
        delete_transient( get_current_user_id().'level_one_card_error' );
    }
}

function make_url_https( $url ) {
    // Exceptions
    if ( strpos($url, 'bookshop.nationalarchives.gov.uk') !== false ) {
        return $url;
    }
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' && strpos( $url, 'http:' ) !== false) {
        $url = str_replace('http:', 'https:', $url);
        return $url;
    }
    return $url;
}
