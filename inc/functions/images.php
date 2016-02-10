<?php

// Alter image sizes for landing page template
add_action( 'after_setup_theme', 'tna_theme_setup' );
function tna_theme_setup() {
	add_image_size( 'landing-page-children-thumb', 768, 180,
		array( 'center', 'center' ) ); // 768 px wide and 180px height)
}