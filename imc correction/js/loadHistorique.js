$(document).ready(function() {
	 $(document).on('click', '#historique-link', function(event) {
        event.preventDefault();
	
    // Appel AJAX pour charger l'historique
    $.ajax({
        type: 'POST',
        url: 'IMCAjax.php', 
        data: {
			action: 'showHistorique',
			},
        success: function(response) {
		
			$('#historique-section').empty();
            $('#historique-section').html(response);
            // Afficher la section Historique
          //$('#historique-section').show();
          
            
        },
        error: function() {
			 console.error('Erreur lors de l\'appel AJAX:', status, error); 
            $('#historique-section').html('<p>Une erreur est survenue lors du chargement de l\'historique.</p>');
        }
    });
 });
});

