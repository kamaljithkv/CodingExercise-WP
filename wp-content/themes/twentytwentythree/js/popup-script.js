jQuery(document).ready(function($) {
    // Show the popup if the cookie is not set
    if (!Cookies.get('thought_of_the_day_seen')) {
        $('#thought-popup').show();
        Cookies.set('thought_of_the_day_seen', '1', { expires: 1 }); // Cookie expires after 1 day
    }

    // Close the popup and set the cookie
    $('#close-popup').click(function() {
        $('#thought-popup').hide();
    });

    // Edit link
     $('.edit-thought-button').click(function (e) {
        e.preventDefault();
        var thoughtId = $(this).data('thought-id');
        $('#editable-thought-form-' + thoughtId).toggle();
    });

});

