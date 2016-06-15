<?php

//Metabox for Feature Box
add_action( 'add_meta_boxes', 'myfield_add_custom_box' );
// Saving the data entered
add_action( 'save_post', 'myfield_save_postdata' );
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
    }
}
add_action( 'add_meta_boxes', 'redirect_url_add_meta_box' );

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
add_action( 'save_post', 'redirect_url_save' );

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
add_action( 'save_post', 'sidebar_save' );

/* Level 1 landing page template metaboxes */

function level_one_meta_boxes() {
	$meta_boxes = array(
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
					'id' => 'number_of_boxes',
					'type' => 'select',
					'options' => array('2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12')
				)
			)
		)
	);
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
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
					'name' => 'Display box',
					'id' => 'box_width_'.$id,
					'type' => 'select',
					'options' => array('Disabled', 'At a third', 'At a half')
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
					'name' => 'Image',
					'desc' => '',
					'id' => 'box_image_url_'.$id,
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Content',
					'desc' => '',
					'id' => 'box_content_'.$id,
					'type' => 'textarea',
					'std' => ''
				)
			)
		);
	}
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
	if ($template_file == 'page-level-1-landing.php') {
		foreach ( $meta_boxes as $meta_box ) {
			$level_one_box = new create_meta_box( $meta_box );
		}
	}
}
add_action( 'init', 'level_one_meta_boxes' );

// Creates meta boxes from $meta_boxes = array()
// See http://www.deluxeblogtips.com/2010/05/howto-meta-box-wordpress.html for more info
class create_meta_box {

	protected $_meta_box;

	// create meta box based on given data
	function __construct($meta_box) {
		$this->_meta_box = $meta_box;
		add_action('admin_menu', array(&$this, 'add'));

		add_action('save_post', array(&$this, 'save'));
	}

	/// Add meta box for multiple post types
	function add() {
			add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), 'page', $this->_meta_box['context'], $this->_meta_box['priority']);
	}

	// Callback function to show fields in meta box
	function show() {
		global $post;

		// Use nonce for verification
		echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

		echo '<table class="form-table">';

		foreach ($this->_meta_box['fields'] as $field) {
			// get current post meta data
			$meta = get_post_meta($post->ID, $field['id'], true);

			echo '<tr>',
			'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
			'<td>';
			switch ($field['type']) {
				case 'text':
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br />', $field['desc'];
					break;
				case 'textarea':
					$field_value = get_post_meta( $post->ID, $field['id'], false );
					$args = array (
						'media_buttons' => false,
						'textarea_rows' => 4,
						'tinymce' => false,
						'quicktags' => array( 'buttons' => 'strong,em,ul,ol,li,link' ),
						'wpautop' => false
					);
					wp_editor( $field_value[0], $field['id'], $args );
					// echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
					echo '<br />', $field['desc'];
					break;
				case 'select':
					echo '<select name="', $field['id'], '" id="', $field['id'], '">';
					foreach ($field['options'] as $option) {
						echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
					}
					echo '</select>';
					break;
				case 'radio':
					foreach ($field['options'] as $option) {
						echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
					}
					break;
				case 'checkbox':
					echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
					break;
			}
			echo     '<td>',
			'</tr>';
		}
		echo '</table>';
	}

	// Save data from meta box
	function save($post_id) {
		// verify nonce
		if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}

		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		// check permissions
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}

		foreach ($this->_meta_box['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];

			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}
}
