$(document).ready(function() {
    $('#form_inscription').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'IMCAjax.php', 
            data: {
                action: 'moduleInscription',
                login: $('#email').val(),
                password: $('#pass').val(),
				password_verif: $('#confirm-pass').val()
            },
            success: function(response) {
				$('#boutons').empty();
				$('#boutons').html(response);
				
            },
            error: function() {}
        });
    });
});