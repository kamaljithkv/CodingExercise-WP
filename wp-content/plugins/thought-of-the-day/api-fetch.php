<?php

// Include WordPress functions
require_once('../../../wp-load.php');

// Define the API endpoint by retrieving it from the plugin settings
// Wordpress admin -> Thought of the Day Settings -> General Settings -> API Endpoint
$api_endpoint = get_option('thought_of_the_day_api_endpoint');

if (empty($api_endpoint)) {
    $api_endpoint = 'https://jsonplaceholder.typicode.com/posts';
}

// Make an API request
// Use wp_remote_get to fetch data from the API and create custom posts.
$response = wp_remote_get($api_endpoint);

if (is_wp_error($response)) {
    // Handle error if the API request fails
    echo 'Failed to fetch data from the API: ' . $response->get_error_message();
} else {
    // Parse the API response
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    if ($data) {
        foreach ($data as $item) {
            // Create a new post for each API item
            $post_data = array(
                'post_title' => sanitize_text_field($item['title']),
                'post_content' => sanitize_text_field($item['body']),
                'post_type' => 'thoughts', // our custom post type
                'post_status' => 'publish',
            );

            // Insert the post
            $post_id = wp_insert_post($post_data);

            // Set the featured image if provided by the API
            // Replace 'image_url_key' with the actual key for the image URL in our API response.
            if (isset($item['image_url_key'])) {
                // Download and set the featured image
                $image_url = esc_url($item['image_url_key']);
                $image_id = thought_set_featured_image($post_id, $image_url);
            }
        }
    }
}

// Helper function to set a featured image for a post
function thought_set_featured_image($post_id, $image_url) {
    $image_id = attachment_url_to_postid($image_url);
    if ($image_id) {
        set_post_thumbnail($post_id, $image_id);
    }
    return $image_id;
}
