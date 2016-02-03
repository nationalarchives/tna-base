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
