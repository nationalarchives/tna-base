<?php

add_action('init', 'add_button');
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
?>