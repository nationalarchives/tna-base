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
        add_meta_box( 'redirect_url-redirect-url', __( 'Redirect Url', 'redirect_url' ), 'redirect_url_html', 'page', 'normal', 'high' );
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
                'toolbar1'=> 'bold,italic,link,unlink',
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


/* Redirect Url */
function redirect_url_get_meta( $value ) {
    global $post;
    $redirect = get_post_meta( $post->ID, 'redirectUrl', true );
    if ( ! empty( $redirect ) ) {
        return is_array( $redirect ) ? stripslashes_deep( $redirect ) : stripslashes( wp_kses_decode_entities( $redirect ) );
    } else {
        return false;
    }
}

function redirect_url_html( $post) {
    wp_nonce_field( '_redirect_url_nonce', 'redirect_url_nonce' ); ?>
    <p>This is to redirect the title of the post to anything.</p>
    <p>
    <label for="redirectUrl"><?php _e( 'Paste Url', 'redirect_url' ); ?></label><br>
    <input class="widefat" type="text" name="redirectUrl" id="redirectUrl" value="<?php echo redirect_url_get_meta( 'redirectUrl' ); ?>">
    </p><?php
}

function redirect_url_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['redirect_url_nonce'] ) || ! wp_verify_nonce( $_POST['redirect_url_nonce'], '_redirect_url_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['redirectUrl'] ) )
        update_post_meta( $post_id, 'redirectUrl', esc_attr( $_POST['redirectUrl'] ) );
}
/* Redirect Url */