$(document).ready(function() {
    $('#modifModal').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'IMCAjax.php', 
            data: {
                action: 'moduleModification',
                login: $('#login').val(),
                old_password: $('#old_password').val(),
                new_password: $('#newPass').val(),
				password_verif: $('#confirm-pass').val()
            },
            success: function(response) {
				$('#modification').empty();
				$('#modification').html(response);
				
            },
            error: function() {}
        });
    });
});
