$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: formData,
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'error') {
                    $('.validation-msg').html(data.validation_msg).css('color', 'red');
                } else if (data.status === 'success') {
                    $('.validation-msg').html('Usuario creado exitosamente').css('color', 'green');
                }
            }
        });
    });
});