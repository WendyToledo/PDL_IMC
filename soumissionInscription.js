$(document).ready(function() {
    $('#form_inscription').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'IMCAjax.php', 
            data: {
                action: 'moduleInscription',
                login: $('#pseudo').val(),
                password: $('#password').val()
		password_verif: $('#password').val()
            },
            success: function(response) {
				$('#boutons').empty();
				$('#boutons').html(response);
				
            },
            error: function() {}
        });
    });
});