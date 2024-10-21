$(document).ready(function() {
    $('#form_connexion').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'IMCAjax.php', 
            data: {
                action: 'moduleConnexion',
                login: $('#login').val(),
                password: $('#password').val()
            },
            success: function(response) {
				$('#boutons').empty();
				$('#boutons').html(response);
				
            },
            error: function() {}
        });
    });
});

