<?php

/**
 * Add Image caption description and URL fields to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */

function image_caption_fields( $form_fields, $post ) {
    
    $form_fields['image-caption-description'] = array(
        'label' => 'Image description',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'image-caption-description', true ),
        'helps' => 'Add image caption description',
    );

    $form_fields['image-caption-url'] = array(
        'label' => 'Image caption URL',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'image-caption-url', true ),
        'helps' => 'Add image caption URL',
    );

    $form_fields['image-caption-url-desc'] = array(
        'label' => 'Image link text',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'image-caption-url-desc', true ),
        'helps' => 'Optional, add link text. If left blank default text is "View in the image library"',
    );

    return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'image_caption_fields', 10, 2 );

/**
 * Save values of Image caption description and URL in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */

function save_image_caption_fields( $post, $attachment ) {
    if( isset( $attachment['image-caption-description'] ) )
        update_post_meta( $post['ID'], 'image-caption-description', $attachment['image-caption-description'] );

    if( isset( $attachment['image-caption-url'] ) )
        update_post_meta( $post['ID'], 'image-caption-url', esc_url( $attachment['image-caption-url'] ) );

    if( isset( $attachment['image-caption-url-desc'] ) )
        update_post_meta( $post['ID'], 'image-caption-url-desc',  $attachment['image-caption-url-desc'] ) ;

    return $post;
}

add_filter( 'attachment_fields_to_save', 'save_image_caption_fields', 10, 2 );

?>