<?php

/**
 * @param $content
 * @return string
 */
function card_wrapper( $content ) {

	$html = '<div class="col-md-4"><div class="card">%s</div></div>';

	return sprintf( $html, $content );
}

/**
 * @param $id
 * @param $url
 * @param $type
 * @param $title
 * @param $content
 * @return string
 */
function card_link( $id, $url, $type, $title, $content ) {

	if ( $type == 'Event' ) {
		$target = 'target="_blank"';
	} else {
		$target = '';
	}

	$html = '<a id="card-%s" href="%s" %s data-gtm-name="%s" data-gtm-id="card_%s" data-gtm-position="card_position_%s" data-gtm-creative="homepage_card_%s" class="homepage-card">%s</a>';

	return sprintf( $html, $id, $url, $target, $title, $id, $id, $type, $content );
}

/**
 * @param $image
 * @return string
 */
function card_image( $image ) {

	$html = '<div class="entry-image" style="background-image: url(%s)"></div>';

	return sprintf( $html, $image );
}

/**
 * @param $date
 * @param $type
 * @return string
 */
function card_date( $date, $type ) {

	if ( $date && $type == 'Event' ) {

		date_default_timezone_set('Europe/London');

		$date = date('l j F Y, H:i', strtotime( $date ));

		$html = '<div class="entry-date"><div class="date">%s</div></div>';

		return sprintf( $html, $date );
	}
}

/**
 * @param $type
 * @param $title
 * @param $description
 * @return string
 */
function card_content( $type, $title, $description ) {

	$type_class = strtolower( $type );
	$description = limit_words( $description );

	$html = '<div class="entry-content %s"><div class="content-type">%s</div><h3>%s</h3><p>%s</p></div>';

	return sprintf( $html, $type_class, $type, $title, $description );
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
 * Returns HTML markup for the cards.
 *
 * @since 1.0
 *
 * @see card_html
 *
 * @param string $id
 * @param string $url
 * @param string $image
 * @param string $type
 * @param string $title
 * @param string $description
 * @param string $date
 * @return string
 */
function card_html( $id, $url, $image, $type, $title, $description, $date ) {

	$content = card_image( $image ) . card_content( $type, $title, $description ) . card_date( $date, $type );

	return card_wrapper( card_link( $id, $url, $type, $title, $content ) );
}

/**
 * Returns HTML markup for the banner.
 *
 * @since 1.0
 *
 * @param string $image
 * @param string $type
 * @param string $title
 * @param string $description
 * @param string $url
 * @param string $date
 * @return string
 */
function banner_html( $image, $type, $title, $description, $url, $date ) {

	$title = esc_attr($title);
	$image = make_path_relative($image);

    $content = card_image( $image ) . card_content( $type, $title, $description ) . card_date( $date, $type );

    return card_wrapper( card_link( 'hero', $url, $type, $title, $content ) );
}
