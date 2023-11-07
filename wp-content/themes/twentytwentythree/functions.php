<?php


function enqueue_popup_script() {
	// Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue the js-cookie library from a CDN
    wp_enqueue_script('js-cookie', '//cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js');

    // Enqueue the JavaScript file and set dependencies (jquery and js-cookie)
    wp_enqueue_script('popup-script', get_template_directory_uri() . '/js/popup-script.js');
}
add_action('wp_enqueue_scripts', 'enqueue_popup_script');



// This code add custom CSS
function enqueue_custom_styles() {
    wp_enqueue_style('thought-listing-styles', get_template_directory_uri() . '/thought-listing-styles.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

// This code add widget menu iteam in Appereance
function theme_widgets_init() {
   register_sidebar(array(
       'name' => 'Primary Sidebar',
       'id' => 'primary-sidebar',
       'description' => 'Widgets for the primary sidebar',
       'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget' => '</li>',
       'before_title' => '<h2 class="widgettitle">',
       'after_title' => '</h2>',
   ));
}
add_action('widgets_init', 'theme_widgets_init');


// This code registers a widget area named 'Thought of the Day Popup Widget Area' that we can use for your widget.
function register_thought_of_the_day_popup_widget_area() {
    register_sidebar(array(
        'name' => 'Thought of the Day Popup Widget Area',
        'id' => 'thought_of_the_day_popup_widget_area',
        'description' => 'Widget area for displaying the "Thought of the Day Popup" widget on the "Thought Listing Page."',
    ));
}
add_action('widgets_init', 'register_thought_of_the_day_popup_widget_area');
