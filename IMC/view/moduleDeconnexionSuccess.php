utilisateur déconnecté<br><br>

<button id="deconnexionBtn" class="bouton" style="display: none">Déconnexion</button>
<button onclick="document.getElementById('connexionModal').style.display = 'flex'"id="connexionBtn" class="bouton">Connexion</button>
<button onclick="document.getElementById('inscriptionModal').style.display = 'flex'"id="InscriptionBtn" class="bouton">Inscription</button>

<script>
	//vider les formulaires 
	document.getElementById('form_imc').reset();
	document.getElementById('form_tmb').reset();
	//enlever les resultats 
	document.getElementById('resultat_imc').innerHTML = '';
	document.getElementById('resultat_tmb').innerHTML = '';
</script>