<script src="js/soumissionDeconnexion.js"></script>
<script src="js/modificationMdp.js"></script>
utilisateur <?php echo $context->utilisateur->email?> connecté<br><br>

<button id="deconnexionBtn" class="bouton">Déconnexion</button>
<button id="modificationBtn" onclick="modif()" class="bouton">Modifier le mot de passe</button>

<script>
	//vider le formulaire de connexion
    document.getElementById('form_connexion').reset();
</script>

