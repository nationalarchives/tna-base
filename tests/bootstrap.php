<?php

require dirname( __DIR__ ) . '/inc/functions/tna-globals.php';
require dirname( __DIR__ ) . '/inc/functions/tna-functions.php';
require dirname( __DIR__ ) . '/inc/functions/404-redirect.php';
require dirname( __DIR__ ) . '/inc/functions/dimox_breadcrumbs.php';
require dirname( __DIR__ ) . '/inc/functions/image_caption.php';
require dirname( __DIR__ ) . '/inc/functions/notification-banner.php';
require dirname( __DIR__ ) . '/inc/functions/tiny_mce.php';
require dirname( __DIR__ ) . '/inc/functions/title-tag.php';
require dirname( __DIR__ ) . '/inc/functions/url-rewriting.php';
require dirname( __DIR__ ) . '/src/CreateMetaBox.php';
require dirname( __DIR__ ) . '/inc/functions/custom-fields.php';

// Enable Composer autoloader
require dirname(__DIR__) . '/vendor/autoload.php';
