// script.js
$(document).ready(function () {
    console.log('Page loaded. Loading default content.');
    loadContent('breakfast');
});

function loadContent(category) {
    console.log('Loading content for category:', category);
    $.ajax({
        url: 'display_table.php',
        type: 'post',
        data: { category: category },
        success: function (response) {
            console.log('Response:', response);
            $('#content-container').html(response);
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}
