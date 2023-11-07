<?php
/*
Plugin Name: Thought of the Day
Description: A plugin for displaying daily thoughts.
Version: 1.0
Author: Lucent Innovation
*/

// Include the settings.php file to Add custom settings option for managing the API endpoint, number of thoughts to show
include(plugin_dir_path(__FILE__) . 'settings.php');

// Include the thought-of-the-day-popupwidget.php file to Create a widget for showing the thought as a popup, The popup should only be visible once for a user.
include(plugin_dir_path(__FILE__) . 'thought-of-the-day-popupwidget.php');


// Create a custom post type for Thoughts
function create_thoughts_post_type() {
    register_post_type('thoughts', array(
        'labels' => array(
            'name' => 'Thoughts',
            'singular_name' => 'Thought',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}
add_action('init', 'create_thoughts_post_type');