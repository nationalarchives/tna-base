<?php
// Adds a box to the main column on the Page edit screens
function myfield_add_custom_box() {
    global $post;
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
    if ($pageTemplate == 'page-section-landing.php') {
        add_meta_box('wp_editor_test_1_box', 'Feature Box', 'myfield_meta_box');
    }
    if ($pageTemplate == 'page.php') {
        add_meta_box(
            'pdf_file_size-pdf-file-size',
            __( 'PDF File Size', 'pdf_file_size' ),
            'pdf_file_size_html',
            'page',
            'normal',
            'default'
        );
    }
}
// Prints the box content
function myfield_meta_box( $post ) {
    $field_value = get_post_meta( $post->ID, 'feat_box', false );
    wp_editor( $field_value[0], 'feat_box',
        array(
            'media_buttons' => false,
            'textarea_rows' => 4,
            'tinymce' => array(
                // Items for the Visual Tab
                'toolbar1'=> 'bold,link,unlink'
            ),
            'quicktags' => false
        )
    );
}
//When the post is saved, saves our custom data
function myfield_save_postdata( $post_id ) {
    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
    // Check permissions
    if ( ( isset ( $_POST['post_type'] ) ) && ( 'page' == $_POST['post_type'] )  ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    }
    else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    // OK, we're authenticated: we need to find and save the data
    if ( isset ( $_POST['feat_box'] ) ) {
        update_post_meta( $post_id, 'feat_box', $_POST['feat_box'] );
    }
}


/* Redirect Metabox */
function redirect_url_add_meta_box() {
    global $post;
    $page_template = get_post_meta( $post->ID, '_wp_page_template', true );
    if ($page_template === 'default') {
        add_meta_box('redirect_url-redirect-url', __( 'Redirect Url', 'redirect_url' ), 'redirect_url_html', 'page', 'normal', 'high');
        add_meta_box('sidebar-sidebar', __( 'Sidebar', 'sidebar' ), 'sidebar_html','page','side','core');
        add_meta_box('webchat-webchat', __( 'Webchat', 'webchat' ), 'webchat_html','page','side','core');
    }
}


function redirect_url_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function redirect_url_html( $post) {
    wp_nonce_field( '_redirect_url_nonce', 'redirect_url_nonce' ); ?>

    <p>
    <input class="widefat" type="text" name="redirectUrl" id="redirectUrl" value="<?php echo redirect_url_get_meta( 'redirectUrl' ); ?>">
    </p>
    <p>This field will redirect your url.</p>
    <?php
}

function redirect_url_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['redirect_url_nonce'] ) || ! wp_verify_nonce( $_POST['redirect_url_nonce'], '_redirect_url_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['redirectUrl'] ) )
        update_post_meta( $post_id, 'redirectUrl', esc_attr( $_POST['redirectUrl'] ) );
}


/* Sidebar Metabox */
function sidebar_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function sidebar_html( $post) {
    wp_nonce_field( '_sidebar_nonce', 'sidebar_nonce' ); ?>
    <p>
    <input class="widefat" type="text" name="sidebar" id="sidebar" value="<?php echo sidebar_get_meta( 'sidebar' ); ?>">
    </p>
    <p>To remove the default sidebar type <strong>'false'</strong></p>
    <?php
}

function sidebar_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['sidebar_nonce'] ) || ! wp_verify_nonce( $_POST['sidebar_nonce'], '_sidebar_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['sidebar'] ) )
        update_post_meta( $post_id, 'sidebar', esc_attr( $_POST['sidebar'] ) );
}

/* Web chat id metabox */
function webchat_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function webchat_html( $post) {
    wp_nonce_field( '_webchat_nonce', 'webchat_nonce' ); ?>
    <p>
    <input class="widefat" type="text" name="webchat" id="webchat" value="<?php echo webchat_get_meta( 'webchat' ); ?>">
    </p>
    <p>Leave blank for the default web chat form</p>
    <?php
}

function webchat_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['webchat_nonce'] ) || ! wp_verify_nonce( $_POST['webchat_nonce'], '_webchat_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['webchat'] ) )
        update_post_meta( $post_id, 'webchat', esc_attr( $_POST['webchat'] ) );
}


/* Level 1 landing page template meta boxes */

function level_one_meta_boxes() {
	$meta_boxes = array(
		// Level 1 page options
		array(
			'id' => 'level_one_options',
			'title' => 'Page options',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Banner button text',
					'desc' => '',
					'id' => 'action_button_title',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Banner button URL',
					'desc' => '',
					'id' => 'action_button_url',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Number of boxes displayed',
					'desc' => '',
					'id' => 'number_of_boxes',
					'type' => 'select',
					'options' => array('0', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12')
				)
			)
		)
	);
	// Level 1 content box loop array
	if (isset($_GET['post'])) {
		$post_id = $_GET['post'];
	} else {
		if (isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		} else {
			$post_id = '';
		}
	}
	if ($post_id) {
		$nBox = get_post_meta( $post_id, 'number_of_boxes', true );
		for ($id = 1; $id <= $nBox; $id++)  {
			$meta_boxes[] = array (
				'id' => 'content-box-'.$id,
				'title' => 'Content box '.$id,
				'pages' => 'page',
				'context' => 'normal',
				'priority' => 'high',
				'fields' => array(
					array(
						'name' => 'Box size',
						'desc' => 'Select &#39;disabled&#39; to hide this box',
						'id' => 'box_width_'.$id,
						'type' => 'select',
						'options' => array('disabled', 'at a third', 'at a half', 'at full width')
					),
					array(
						'name' => 'Title',
						'desc' => '',
						'id' => 'box_title_'.$id,
						'type' => 'text',
						'std' => ''
					),
					array(
						'name' => 'Title URL',
						'desc' => '',
						'id' => 'box_title_url_'.$id,
						'type' => 'text',
						'std' => ''
					),
					array(
						'name' => 'Image URL',
						'desc' => '',
						'id' => 'box_image_url_'.$id,
						'type' => 'text',
						'std' => ''
					),
					array(
						'name' => 'Subpage links',
						'desc' => 'Please use the &#39;link&#39;, &#39;ul&#39; and &#39;li&#39; buttons to create your list of subpage links',
						'id' => 'box_content_'.$id,
						'type' => 'textarea',
						'std' => ''
					)
				)
			);
		}
	}
	// Adds meta boxes to Level 1 Landing page template
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
	if ($template_file == 'page-level-1-landing.php') {
		foreach ( $meta_boxes as $meta_box ) {
			$level_one_box = new CreateMetaBox( $meta_box );
		}
	}
}


function notification_meta_boxes() {
	$notification_meta_boxes = array(
		array(
			'id' => 'notification_options',
			'title' => 'Notification page banner options',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'low',
			'fields' => array(
				array(
					'name' => 'Banner',
					'desc' => '<p>Enabling this banner adds a notification along the top of this page only.</p>',
					'id' => 'notification_banner_show',
					'type' => 'select',
					'options' => array('Disable', 'Enable')
				),
				array(
					'name' => 'Banner title',
					'desc' => '',
					'id' => 'notification_banner_title',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Banner content',
					'desc' => '',
					'id' => 'notification_banner_content',
					'type' => 'textarea',
					'std' => ''
				)
			)
		)
	);
	foreach ( $notification_meta_boxes as $meta_box ) {
		$notification_box = new CreateMetaBox( $meta_box );
	}
}



