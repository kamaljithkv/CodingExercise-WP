<?php
// Add a menu item in the WordPress admin menu
function thought_of_the_day_settings_menu() {
    add_menu_page('Thought of the Day Settings', 'Thought of the Day', 'manage_options', 'thought-of-the-day-settings', 'thought_of_the_day_settings_page');
}
add_action('admin_menu', 'thought_of_the_day_settings_menu');

// Callback function to display the settings page
function thought_of_the_day_settings_page() {
    ?>
    <div class="wrap">
        <h2>Thought of the Day Settings</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('thought_of_the_day_options');
            do_settings_sections('thought-of-the-day-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings and fields
function thought_of_the_day_register_settings() {
    register_setting('thought_of_the_day_options', 'thought_of_the_day_api_endpoint');
    register_setting('thought_of_the_day_options', 'thought_of_the_day_num_thoughts');

    add_settings_section('thought_of_the_day_general', 'General Settings', 'thought_of_the_day_general_section_callback', 'thought-of-the-day-settings');

    add_settings_field('thought_of_the_day_api_endpoint', 'API Endpoint', 'thought_of_the_day_api_endpoint_callback', 'thought-of-the-day-settings', 'thought_of_the_day_general');
    add_settings_field('thought_of_the_day_num_thoughts', 'Number of Thoughts to Show', 'thought_of_the_day_num_thoughts_callback', 'thought-of-the-day-settings', 'thought_of_the_day_general');
}
add_action('admin_init', 'thought_of_the_day_register_settings');

// Callback for the API endpoint field
function thought_of_the_day_api_endpoint_callback() {
    $api_endpoint = get_option('thought_of_the_day_api_endpoint');
    echo "<input type='text' name='thought_of_the_day_api_endpoint' value='$api_endpoint' class='regular-text' />";
}

// Callback for the number of thoughts field
function thought_of_the_day_num_thoughts_callback() {
    $num_thoughts = get_option('thought_of_the_day_num_thoughts');
    echo "<input type='number' name='thought_of_the_day_num_thoughts' value='$num_thoughts' />";
}

// Callback for the general settings section
function thought_of_the_day_general_section_callback() {
    echo 'This is the general settings section content.';
}