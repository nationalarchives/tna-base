<?php

// Alter image sizes for landing page template
add_action( 'after_setup_theme', 'tna_theme_setup' );
function tna_theme_setup() {
	add_image_size( 'landing-page-children-thumb', 768, 244,
		array( 'center', 'center' ) );
	add_image_size( 'feature-box-thumb', 768, 1152 );
	add_image_size( 'default-page-header', 820, 546 );
}