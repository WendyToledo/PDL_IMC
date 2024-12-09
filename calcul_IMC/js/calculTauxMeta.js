$(document).ready(function() {
    $('#form_tmb').submit(function(event) {
		console.log('Formulaire soumis'); 
        event.preventDefault();
// Afficher les valeurs des champs dans la console pour déboguer
        console.log('Age:', $('#age').val());
        console.log('Poids:', $('#poids_tmb').val());
        console.log('Taille:', $('#taille_tmb').val());
        console.log('Sexe:', $('#sexe').val());

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
				console.log('Réponse du serveur:', response);
				$('#resultat_tmb').empty();
				$('#resultat_tmb').html(response);
				
            },
            error: function() {}
        });
    });
});