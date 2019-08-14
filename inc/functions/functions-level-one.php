<?php

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
                    'name' => 'Tag line',
                    'desc' => 'Max 7 words',
                    'id' => 'level_one_tag_line',
                    'type' => 'text',
                    'std' => ''
                ),
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

        for ($i = 1; $i <= 12; $i++)  {
            $meta_boxes[] = array (
                'id' => 'level-one-card-'.$i,
                'title' => 'Card '.$i,
                'pages' => 'page',
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'name' => 'Title',
                        'desc' => '',
                        'id' => 'card_level_one_title_'.$i,
                        'type' => 'text',
                        'std' => ''
                    ),
                    array(
                        'name' => 'URL',
                        'desc' => '',
                        'id' => 'card_level_one_url_'.$i,
                        'type' => 'text',
                        'std' => ''
                    ),
                    array(
                        'name' => 'Image URL',
                        'desc' => '',
                        'id' => 'card_level_one_image_'.$i,
                        'type' => 'text',
                        'std' => ''
                    ),
                    array(
                        'name' => 'Label',
                        'desc' => '',
                        'id' => 'card_level_one_label_'.$i,
                        'type' => 'select',
                        'options' => array('No label', 'Feature', 'News', 'Blog', 'Multimedia', 'Event', 'Resource'),
                    ),
                    array(
                        'name' => 'Excerpt',
                        'desc' => '',
                        'id' => 'card_level_one_excerpt_'.$i,
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