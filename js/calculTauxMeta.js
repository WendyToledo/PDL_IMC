$(document).ready(function() {
    $('#form_tmb').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'IMCAjax.php', 
            data: {
                action: 'showTMB',
                age: $('#age').val(),
                poids: $('#poids_tmb').val(),
                taille: $('#taille_tmb').val(),
                sexe: $('#sexe').val()
            },
            success: function(response) {
				$('#resultat_tmb').empty();
				$('#resultat_tmb').html(response);
				
            },
            error: function() {}
        });
    });
});
