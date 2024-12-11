function changeStatus(url) {
    console.log('rest');
    $.ajax({
        url: url,
        type: 'GET',
        success: function(response) {
            // toaster(response.message, 'success');
        },
        error: function(xhr, status, error) {
            // toaster(response.message, 'error');
        }
    });
}
