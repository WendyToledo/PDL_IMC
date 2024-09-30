$(document).ready(function() {
    $('#form_imc').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'IMCAjax.php', 
            data: {
                action: 'calculImc',
                taille: $('#taille').val(),
                poids: $('#poids').val()
            },
            success: function(response) {
				$('#resultat_imc').empty();
				$('#resultat_imc').html(response);
				
            },
            error: function() {}
        });
    });
});

