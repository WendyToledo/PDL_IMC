<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/soumissionConnexion.js"></script>
    <script src="js/soumissionInscription.js"></script>
    <script src="js/calculImc.js"></script>
    <title> Calcul d'IMC </title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        input[type=text], input[type=password]{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            font-size: 16px;
        }
        input[type=submit] {
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            background-color: #B0C4DE;
        }
        label{
            color: black;
        }
        h2{
            color : #5F90CB;
        }
        inscriptionModal{
            margin-right: 4px;
        }

        input[type=submit]:hover {
            background-color: #5F90CB;
        }
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            display: flex;
            width: 60%;
            margin: 0 auto;
            justify-content: center;
            border: 2px solid #B0C4DE;
        }
        .bandeau {
            background-color: #5F90CB;
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
            z-index: 1000;
        }
        .modal-content {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            position: relative;
            z-index: 1001;
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
            background-color: #5F90CB;
            font-weight: bold;
            cursor: pointer;
        }
        #boutons{
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }
        #connexionBtn {
            margin-right: 10px;
        }
        .bouton:hover {
            background-color: #B0C4DE;
        }
        .input {
            position: relative;
            display: inline-block;
        }

        .input .unit {
            position: absolute;
            right: 10px;
            top: 45%;
            color: #000000;
            font-style: italic;
        }
        label {
            color: #5F90CB;
            font-weight: bold;
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
            echo ('<button id="InscriptionBtn" onclick="inscription()" class="bouton">Inscription</button>');

        } ?>
    </div>
</div>



<div id="connexionModal" class="modal">
    <div class="modal-content">
        <span id="close" class="closeConnexion" onclick="document.getElementById('connexionModal').style.display = 'none'">&times;</span>
        <h2>Connexion</h2><br>
        <form id="form_connexion" method="POST">
            <label for="login">Email</label>
            <input type="text" id="login" name="login" required><br><br>
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
            <label for="email">Email</label>
            <input type="text" id="email" name="email"required><br><br>
            <label for="password">Mot de passe</label>
            <input type="password" id="pass" name="pass"required><br><br>
            <label for="confirm-password">Confirmer votre mot de passe</label>
            <input type="password" id="confirm-pass" name="confirm-pass"required><br><br>
            <div id="inscription"></div><br><br>
            <input type="submit" value="S'inscrire" onclick="return validateForm()">
        </form>
    </div>
</div>

<br><br>
<div class="container">
    <form id="form_imc" method="POST">
        <div class="input">
            <label for="taille">Taille</label>
            <input type="text" name="taille" id="taille" placeholder="Indiquer votre taille" required oninput="notLetter(this)" min="0" max="999">
            <span class="unit">cm</span>
        </div>
        <br><br>
        <div class="input">
            <label for="poids">Poids</label>
            <input type="text" name="poids" id="poids" placeholder="Indiquer votre poids" required oninput="notLetter(this)" min="0" max="999">
            <span class="unit">kg</span>
        </div>
        <br><br>
        <input type="submit" value="Calculer">
    </form>
</div>
<div id="resultat_imc">
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