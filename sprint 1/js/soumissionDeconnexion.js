$(document).ready(function() {
    $('#deconnexionBtn').click(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'IMCAjax.php', 
            data: {
                action: 'moduleDeconnexion',
            },
            success: function(response) {
				$('#boutons').empty();
				$('#boutons').html(response);
            },
            error: function() {}
        });
    });
});


