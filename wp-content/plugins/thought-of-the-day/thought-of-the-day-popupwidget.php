<?php

class ThoughtOfTheDayPopupWidget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'thought_of_the_day_popup_widget',
            'Thought of the Day Popup',
            array(
                'description' => 'Displays a popup with the thought of the day.'
            )
        );
    }

    public function widget($args, $instance) {
        // Widget output goes here
        $thought_content = isset($instance['thought_content']) ? $instance['thought_content'] : '';

        // Check if the user has already seen the popup
        if (!isset($_COOKIE['thought_of_the_day_seen'])) {
            echo '<div id="thought-popup">';
            echo '<span id="close-popup">Close</span>';
            echo '<p>Today\'s Thought: "' . esc_html($thought_content) . '"</p>';
            echo '<a href="'.home_url().'/thought-listing/">Show more thoughts</a>';
            echo '</div>';

            // Set a cookie to track that the user has seen the popup
            setcookie('thought_of_the_day_seen', '1', time() + 3600 * 24, '/');
        }
    }

    public function form($instance) {
        // Widget settings form
        $thought_content = isset($instance['thought_content']) ? esc_attr($instance['thought_content']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('thought_content'); ?>">Thought Content:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('thought_content'); ?>" name="<?php echo $this->get_field_name('thought_content'); ?>"><?php echo $thought_content; ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        // Save widget settings
        $instance = $old_instance;
        $instance['thought_content'] = sanitize_text_field($new_instance['thought_content']);
        return $instance;
    }
}

function thought_of_the_day_register_widgets() {
    register_widget('ThoughtOfTheDayPopupWidget');
}
add_action('widgets_init', 'thought_of_the_day_register_widgets');