<?php
/**
 * TNA-base admin options
 */

function tna_base_menu() {
	add_menu_page( 'TNA-base settings', 'TNA-base', 'administrator', 'tna-base-admin-page', 'tna_base_admin_page', 'dashicons-admin-generic', 21  );

	add_action( 'admin_init', 'tna_base_admin_page_settings' );
}

function tna_base_admin_page_settings() {
	register_setting( 'tna-base-settings-group', 'twitter_shortcode' );
}

function tna_base_admin_page() {
	if (!current_user_can('administrator'))  {
		wp_die( __('You do not have sufficient pilchards to access this page.')    );
	}
	?>
	<style>
		.tna-base-admin input[type=text] {
			width: 100%;
			max-width: 320px;
		}
		.tna-base-admin textarea {
			width: 100%;
			max-width: 320px;
			height: 12em;
		}
	</style>
	<div class="wrap tna-base-admin">
		<h1>TNA-base settings</h1>
		<form method="post" action="options.php" novalidate="novalidate">
			<?php settings_fields( 'tna-base-settings-group' ); ?>
			<?php do_settings_sections( 'tna-base-settings-group' ); ?>

			<h2>Twitter shortcode</h2>
			<p>Usage: [twitter-widget]</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="twitter_shortcode">Twitter widget code</label></th>
					<td>
						<textarea name="twitter_shortcode"><?php echo get_option('twitter_shortcode') ; ?></textarea>
					</td>
				</tr>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

// [twitter-widget]
function twitter_shortcode( $atts ){
	return get_option('twitter_shortcode');
}
add_shortcode( 'twitter-widget', 'twitter_shortcode' );