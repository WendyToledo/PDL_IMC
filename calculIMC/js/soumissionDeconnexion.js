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
                $("#modification").hide();
				$('#boutons').empty();
				$('#boutons').html(response);
                $('#historique').hide();

            },
            error: function() {}
        });
    });
});
