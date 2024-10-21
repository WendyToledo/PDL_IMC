<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		   <script src="js/soumissionConnexion.js"></script>
		   <script src="js/soumissionInscription.js"></script>
		   <script src="js/calculImc.js"></script>
		    <script src="js/calculTauxMeta.js"></script>
		   <script src="js/scripts.js"></script>
		   <link rel="stylesheet" href="css/style.css">
		<title> Calcul d'IMC </title>
		
	</head>

	<body>
		
	<div class="bandeau">
        <h1>Calcul d'IMC et TMB</h1>
        <div id="boutons">
            <?php if (isset($_SESSION['id'])): ?>
                <button id="deconnexionBtn" onclick="deco()" class="bouton">Déconnexion</button>
            <?php else: ?>
                <button id="connexionBtn" onclick="co()" class="bouton">Connexion</button>
                <button id="InscriptionBtn" onclick="inscription()" class="bouton">Inscription</button>
            <?php endif; ?>
        </div>
    </div>

    <div class="main-container">
        <!-- Inclusion du menu latéral et des sections -->
        <?php include 'menu.php'; ?>
    </div>

    <!-- Modals de connexion et d'inscription -->
    <div id="connexionModal" class="modal">
        <div class="modal-content">
            <span id="close" class="closeConnexion" onclick="document.getElementById('connexionModal').style.display = 'none'">&times;</span>
            <h2>Connexion</h2>
            <form id="form_connexion" method="POST">
                <label for="login">Email</label>
                <input type="text" id="login" name="login" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Se connecter" onclick="document.getElementById('connexionModal').style.display = 'none'">
            </form>
        </div>
    </div>

    <div id="inscriptionModal" class="modal">
        <div class="modal-content">
            <span id="close" class="closeInscription" onclick="document.getElementById('inscriptionModal').style.display = 'none'">&times;</span>
            <h2>Inscription</h2>
            <form id="form_inscription" method="POST">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="pass" name="pass" required>
                <label for="confirm-password">Confirmer votre mot de passe</label>
                <input type="password" id="confirm-pass" name="confirm-pass" required>
                <input type="submit" value="S'inscrire">
            </form>
        </div>
    </div>
</body>
	<script>
		function deco () {
			<?php
				// Destroying the session
				session_destroy();
				unset($_SESSION['id']);
			?>
			location.reload();
		};

		function co () {
			document.getElementById("connexionModal").style.display = "flex";
		};
		
		function notLetter(input) {
			//empeche l'utilisateur de taper des lettres
            input.value = input.value.replace(/[^\d]/g, '');
        };
        function inscription(){
            document.getElementById("inscriptionModal").style.display = "flex";
        }
		function validateForm() {
			var nom = document.getElementById('nom').value;
			var prenom = document.getElementById('prenom').value;
			var email = document.getElementById('email').value;
			var pass = document.getElementById('pass').value;
			var confirmPass = document.getElementById('confirm-pass').value;

			if (!nom || !prenom || !email || !pass || !confirmPass) {
				return false; //empêche la fermeture du modal
			}
			document.getElementById('inscriptionModal').style.display = 'none';
			return true; //autorise la soumission du formulaire
		}
	</script>
</html>
