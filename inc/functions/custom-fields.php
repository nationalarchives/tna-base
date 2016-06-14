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

add_action( 'add_meta_boxes', 'level_one_meta_boxes' );
function level_one_meta_boxes() {
    global $post;
    if(!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-level-1-landing.php' ) {
            add_meta_box( 'action-button-id', 'Call to action button', 'action_button_meta_box', 'page', 'normal', 'high' );
        }
    }
}
function action_button_meta_box( $post ) {
    $values = get_post_custom( $post->ID );
    $title = isset( $values['action_button_title'] ) ? esc_attr( $values['action_button_title'][0] ) : '';
    $url = isset( $values['action_button_url'] ) ? esc_attr( $values['action_button_url'][0] ) : '';
    echo '<p>Call to action button appears in top banner</p>';
    wp_nonce_field( 'action_button_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <label for="action_button_title">Call to action text</label><br>
    <input type="text" name="action_button_title" id="action_button_title" value="<?php echo $title; ?>" /><br>
    <label for="action_button_url">Call to action URL</label><br>
    <input type="text" name="action_button_url" id="action_button_url" value="<?php echo $url; ?>" />
    <?php
}
add_action( 'save_post', 'action_button_meta_box_save' );
function action_button_meta_box_save( $post_id ) {
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'action_button_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );

    // Make sure your data is set before trying to save it
    if( isset( $_POST['action_button_title'] ) )
        update_post_meta( $post_id, 'action_button_title', wp_kses( $_POST['action_button_title'], $allowed ) );

    if( isset( $_POST['action_button_url'] ) )
        update_post_meta( $post_id, 'action_button_url', esc_attr( $_POST['action_button_url'] ) );
}