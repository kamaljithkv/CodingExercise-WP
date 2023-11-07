<?php
/*
Template Name: Thought Listing Page
*/
get_header();

?>

<div id="thought-listing">
    <div id="sidebar">
        <?php
        // Check if the widget area exists and display the widget
        if (is_active_sidebar('thought_of_the_day_popup_widget_area')) {
            dynamic_sidebar('thought_of_the_day_popup_widget_area');
        }
        ?>
    </div>

    <h1 class="page-title"><?php the_title(); ?></h1>

    <div class="thoughts">
        <?php
        // Retrieve the number of thoughts to show from the plugin settings
        $num_thoughts = get_option('thought_of_the_day_num_thoughts');

        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        $thoughts_query = new WP_Query(array(
            'post_type' => 'thoughts',
            'posts_per_page' => $num_thoughts, // Display the dynamic number of thoughts per page
            'paged' => $paged,
        ));

        if ($thoughts_query->have_posts()) {
            while ($thoughts_query->have_posts()) {
                $thoughts_query->the_post();
                $thought_id = get_the_ID();
                $thought_image_id = get_post_meta($thought_id, 'thought_image_id', true);

                ?>
                <div class="thought">
                    <div class="thought-content">
                        <h2 class="thought-title"><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                    <?php
                    if (empty($thought_image_id)) {
                        // Display the edit button if there is no image
                        echo '<a href="#" class="edit-thought-button" data-thought-id="' . $thought_id . '">Edit</a>';
                    }
                    // Default form (hidden by default)
                    echo '<div class="default-thought-form" id="default-thought-form-' . $thought_id . '">';
                    echo '</div>';
                    // Editable form (hidden by default)
                    echo '<div class="editable-thought-form" id="editable-thought-form-' . $thought_id . '" style="display: none;">';
                    ?>
                    <form method="post" action="<?php echo home_url() . '\wp-content\plugins\thought-of-the-day\handle-thought-image-upload.php'; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="edit-thought">
                        <input type="hidden" name="thought-id" value="<?php echo $thought_id; ?>">
                        <label for="thought-image">Add Image:</label>
                        <input type="file" name="thought-image" id="thought-image-<?php echo $thought_id; ?>" accept="image/*">
                        <input type="submit" name="edit-thought" value="Add Image">
                    </form>
                    <?php
                    echo '</div>';
                    ?>
                </div>
                <?php
            }
            // Restore the global $post variable
            wp_reset_postdata();
        } else {
            echo '<p>No thoughts to display.</p>';
        }
        ?>
    </div>

    <div class="pagination bottom-pagination">
        <?php
        echo 'Showing ' . (($paged - 1) * $num_thoughts + 1) . ' - ' . min($paged * $num_thoughts, $thoughts_query->found_posts) . ' of ' . $thoughts_query->found_posts . ' thoughts';
        echo paginate_links(array(
            'total' => $thoughts_query->max_num_pages,
            'prev_text' => '&laquo; Previous',
            'next_text' => 'Next &raquo;',
        ));
        ?>
    </div>
</div>

<?php get_footer(); ?>
