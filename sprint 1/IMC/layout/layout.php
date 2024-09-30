<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		   <script src="js/soumissionConnexion.js"></script>
		<title> Calcul d'IMC </title>
		<style>
			body {
				font-family: Arial, Helvetica, sans-serif;
			}
			input[type=text] {
				width: 100%;
				padding: 12px;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
				margin-top: 6px;
				margin-bottom: 16px;
			}
			input[type=submit] {
				color: white;
				padding: 12px 20px;
				border: none;
				border-radius: 4px;
				background-color: #B0C4DE;
			}
			input[type=submit]:hover {
				background-color: #6495ED;
			}
			.bandeau {
				background-color: #6495ED;
				padding: 10px;
				color: white;
			}
			h1 {
				text-align:center;
			}
			.modal {
				display: none;
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background-color: rgba(0, 0, 0, 0.5);
				justify-content: center;
				align-items: center;
			}
			.modal-content {
				background-color: #f2f2f2;
				padding: 20px;
				border-radius: 5px;
			}
			#close {
				color: #aaaaaa;
				float: right;
				font-size: 28px;
				font-weight: bold;
			}
			#close:hover,
			#close:focus {
				color: #000;
				text-decoration: none;
				cursor: pointer;
			}
			.bouton {
				color: white;
				padding: 12px 20px;
				border: 2px solid white;
				border-radius: 4px;
				background-color: #6495ED;
                padding-block-end: 20px;
                font-weight: bold;
				cursor: pointer;
			}
			.bouton:hover {
				background-color: #B0C4DE;
			}
		</style>
	</head>

	<body>
		
		<div class="bandeau"> 
			<h1>Calcul d'IMC </h1>
			<div id="boutons">
    <?php if(isset($_SESSION['id'])) {
        echo('<button id="deconnexionBtn" onclick="deco()" class="bouton">Déconnexion</button>');
    } else {
        echo ('<button id="connexionBtn" onclick="co()" class="bouton">Connexion</button>');
        echo ('<button id="InscriptionBtn" onclick="inscription()" class="bouton">Inscription</button');
    } ?>
</div>
		</div>
		<?php if(isset($_SESSION['id'])) {
			echo 'Bienvenu '.$_SESSION['id'];
		} ?>

		<div id="connexionModal" class="modal">
			<div class="modal-content">
				<span id="close" class="closeConnexion" onclick="document.getElementById('connexionModal').style.display = 'none'">&times;</span>
				<h2>Connexion</h2><br>
				<form id="form_connexion" method="POST">
					<label for="login">Pseudo</label>
					<input type="text" id="login" name="login" style="width: 200px;" required><br><br>
					<label for="password">Mot de passe</label>
					<input type="password" id="password" name="password"required><br><br>
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
                    <input type="text" id="nom" name="nom"required><br><br>
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom"required><br><br>
                    <label for="date">Date de naissance</label>
                    <input type="text" id="date" name="date"required><br><br>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo"required><br><br>
                    <label for="password">Mot de passe</label>
                    <input type="text" id="pass" name="pass"required><br><br>
                    <div id="inscription"></div><br><br>
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

        function inscription(){
            document.getElementById("inscriptionModal").style.display = "flex";
        }
		
	</script>
</html>
