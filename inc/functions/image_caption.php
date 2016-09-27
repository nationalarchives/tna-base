<?php

/**
 * Add Image caption description and URL fields to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */

function image_caption_fields( $form_fields, $post ) {

    $form_fields["custom8"]["tr"] = "
    <div>
        <span style='background:#dddae0;color:#8b898d;padding:20px; display:inline-block; width:100%; box-sizing: border-box;'>
            Write a featured image caption to appear when the ‘eye’ logo is clicked. Link to our image library, or another source, if applicable.

        </span>
    </div>";


    $form_fields['image-caption-description'] = array(
        'label' => 'Featured image description',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'image-caption-description', true ),
        'helps' => 'Add image library title & reference',
    );

    $form_fields['image-caption-url'] = array(
        'label' => 'Image URL',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'image-caption-url', true ),
        'helps' => 'Add a link to the image source',
    );

    $form_fields['image-caption-url-desc'] = array(
        'label' => 'Hyperlink text',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'image-caption-url-desc', true ),
        'helps' => 'If left blank, default text is "View in the image library"',
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

/*
    Image caption function

    Usage:
    * feature-img class is needed to wrap image and get_image_caption function
    * get_image_caption follows image
    * By default the image caption is positioned at the bottom of the feature-img element
    * To position the caption at the top change the argument

    Example:
    <div class="feature-img">
        <img src="image.jpg" alt="image">
        <?php get_image_caption( 'top' ) ?>
    </div>
*/
function get_image_caption( $position='bottom' ) {
    $img_caption_desc = get_post_meta(get_post_thumbnail_id(), 'image-caption-description', true);
    $img_caption_url = get_post_meta(get_post_thumbnail_id(), 'image-caption-url', true);
    $img_caption_url_desc = get_post_meta(get_post_thumbnail_id(), 'image-caption-url-desc', true);
    if ( $position == 'bottom' ) {
        $position = 'img-caption-bottom';
    } else {
        $position = 'img-caption-top';
    }
    if(!empty($img_caption_desc) && !empty($img_caption_url)) : ?>
        <div class="feature-img-caption <?php echo $position; ?>">
            <button class="eye_caption">&nbsp;</button>
            <div class="image_caption_back">
                <span class="clearfix"><?php echo $img_caption_desc; ?></span>
                <a href="<?php echo $img_caption_url ?>" target="_blank">
                    <?php if  (empty($img_caption_url_desc) ) :?>
                        View in the image library
                    <?php else: ?>
                        <?php echo $img_caption_url_desc ; ?>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    <?php endif;
}
