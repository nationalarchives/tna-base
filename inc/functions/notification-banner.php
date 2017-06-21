<?php
// Notification banner
// When enabled, via dashboard banner settings page, displays a notification banner at the top of the page before <header>
// Utilising WP Settings API (https://codex.wordpress.org/Settings_API)
if ( ! function_exists( 'notification_banner' ) ) :
	function notification_banner() {
		$enable = get_option('enable_banner');
		$notice_title = get_option('banner_title');
		$notice_text = get_option('banner_text');
		global $post;
		if ( $enable && $notice_title ) {
			?>
			<div class="notification-banner">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="notice">
								<strong class="title"><?php echo $notice_title; ?></strong>
								<?php echo $notice_text; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		elseif ( get_post_meta( $post->ID, 'notification_banner_show', true ) == 'Enable' ) {
			$notice_page_title = get_post_meta( $post->ID, 'notification_banner_title', true );
			$notice_page_text = get_post_meta( $post->ID, 'notification_banner_content', true );
			?>
			<div class="notification-banner">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="notice">
								<strong class="title"><?php echo $notice_page_title; ?></strong>
								<?php echo $notice_page_text; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
endif;

// Populates the option page
function banner_settings_page() {
	?>
	<div class="wrap">
		<h1>Notification banner</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields('section');
			do_settings_sections('banner-settings');
			submit_button();
			?>
		</form>
	</div>
	<?php
}

// Creates menu item in the Dashboard
function add_banner_menu_item() {
	add_options_page('Notification banner settings', 'Notification banner', 'manage_options', 'my-setting-admin', 'banner_settings_page', null, 99);
}

// Callback functions for form
function enable_banner_element() {
	?>
	<input type="checkbox" name="enable_banner" value="1" <?php checked(1, get_option('enable_banner'), true); ?> />
	<?php
}

function banner_title_element() {
	?>
	<input type="text" name="banner_title" id="banner_title" value="<?php echo get_option('banner_title'); ?>" />
	<p>Field required to enable banner</p>
	<?php
}

function banner_text_element() {
	wp_editor( get_option('banner_text'), 'banner_text',
		array(
			'media_buttons' => false,
			'textarea_rows' => 4,
			'tinymce' => array( 'toolbar1'=> 'bold,link,unlink' ),
			'quicktags' => false,
			'wpautop' => false
		)
	);
}

// Adds section, fields and settings to options page in Dashboard > Settings > Notification banner
function display_banner_panel_fields() {
	add_settings_section('section', 'Banner settings', null, 'banner-settings');

	add_settings_field('enable_banner', 'Enable banner site wide', 'enable_banner_element', 'banner-settings', 'section');
	add_settings_field('banner_title', 'Banner title', 'banner_title_element', 'banner-settings', 'section');
	add_settings_field('banner_text', 'Banner text', 'banner_text_element', 'banner-settings', 'section');

	register_setting('section', 'enable_banner');
	register_setting('section', 'banner_title');
	register_setting('section', 'banner_text');
}

