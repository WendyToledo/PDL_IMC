$(document).ready(function() {
    $('#modifModal').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'IMCAjax.php', 
            data: {
				
                action: 'moduleModification',
                login2: $('#login2').val(),
                old_password: $('#old_password').val(),
                new_password: $('#newPass').val(),
				password_verif2: $('#confirm-pass2').val()
            },
            success: function(response) {
				console.log('Réponse du serveur:', response);
				// Affichage des données envoyées pour debug
                console.log('Login: ' + $('#login2').val());
                console.log('Old Password: ' + $('#old_password').val());
                console.log('New Password: ' + $('#newPass').val());
                console.log('Password Verif: ' + $('#confirm-pass2').val());
	
				$('#modification').empty();
				$('#modification').html(response);
				setTimeout(function(){
					$('#modification').fadeOut();
				},3000);
				
            },
            error: function() {}
        });
    });
});
