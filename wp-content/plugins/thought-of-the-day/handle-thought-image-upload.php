<?php
if (isset($_POST['edit-thought']) && isset($_POST['thought-id'])) {
    $thought_id = $_POST['thought-id'];

    // Handle image upload and update post meta
    if ($_FILES['thought-image']['error'] === UPLOAD_ERR_OK) {
        $image_data = wp_handle_upload($_FILES['thought-image'], array('test_form' => false));

        if ($image_data && !isset($image_data['error'])) {
            $image_url = $image_data['url'];

            // Update post meta with the image URL
            update_post_meta($thought_id, 'thought_image_id', $image_url);
        }
    }

    // Redirect back to the thought listing page
    wp_safe_redirect(get_permalink());
    exit;
}
