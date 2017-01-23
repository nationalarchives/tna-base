<?php

function add_button() {
    if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
    {
        add_filter('mce_external_plugins', 'add_plugin');
        add_filter('mce_buttons', 'register_button');
    }
}
function register_button($buttons) {
    array_push($buttons, "left_list_view_thumbnail");
    array_push($buttons, "right_list_view_thumbnail");
    return $buttons;
}
function add_plugin($plugin_array) {
    $plugin_array['tna'] = get_bloginfo('template_url').'/js/tiny_mce.js';
    return $plugin_array;
}

function classes_tinymce($settings) {
    $new_styles = array(
        array(
            'title' => 'None',
            'value'	=> ''
        ),
        array(
            'title'	=> 'table',
            'value'	=> 'table',
        ),
        array(
            'title'	=> 'table-striped',
            'value'	=> 'table table-striped',
        ),
        array(
            'title'	=> 'table-bordered',
            'value'	=> 'table table-bordered',
        ),
    );
    $settings['table_class_list'] = json_encode( $new_styles );
    return $settings;
}