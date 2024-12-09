<script src="js/soumissionDeconnexion.js"></script>
<script src="js/voirReservation.js"></script>
utilisateur <?php echo $context->utilisateur->email?> inscrit et connecté<br><br>

<button id="deconnexionBtn" class="bouton">Déconnexion</button>

<script>
	//vider le formulaire d'inscription
	document.getElementById('form_inscription').reset();
    //fermer le modal d'inscription
    document.getElementById('inscriptionModal').style.display = 'none';
</script>