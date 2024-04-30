$(document).ready(function() {
    $('#formHashtag').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'components/php/geraHashtag.php',
            data: formData,
            success: function(response) {
                $('#hashtagsGeradas').html(response);
            }
        });
    });
});
