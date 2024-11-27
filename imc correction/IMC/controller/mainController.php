<?php

class mainController
{
    public static function index($request,$context){

        return context::SUCCESS;
    }


    public static function moduleConnexion($request,$context)
    {
        $identifiant = $_POST['login'];
        $pass = $_POST['password'];

        $user =  userTable::getUserByLoginAndPass($identifiant,$pass);
        if($user) {
            $_SESSION['user_id'] = $user->id;
            $context->utilisateur  =$user;
            $user1=userTable::updateLastLogin($identifiant,$pass);
            return context::SUCCESS;
        }
        return context::ERROR;
    }

    public static function moduleDeconnexion($request,$context)
    {
        session_destroy();

        return context::SUCCESS;
    }

    public static function moduleInscription($request,$context)
    {
        $identifiant = $_POST['login'];
        $pass = $_POST['password'];
        $pass_verif = $_POST['password_verif'];

        if ($pass !== $pass_verif) {
            $context->errorMessage = "Mots de passe différents";
            return context::ERROR;
        }

        $user = userTable::addUser ($identifiant, $pass);
        $context->utilisateur  = $user;
        return context::SUCCESS;
    }
    // Méthode de calcul de l'IMC
    public static function calculImc($request, $context)
{
	
	// Vérification de la présence des paramètres nécessaires
	$poids = isset($_POST['poids']) ? (float)$_POST['poids'] : null;
	$taille = isset($_POST['taille']) ? (float)$_POST['taille'] : null;

	// Ajout de debug pour voir les valeurs soumises
    error_log("Poids: " . $poids);
    error_log("Taille: " . $taille);

	// Assurez-vous que les valeurs sont valides
	if ($poids && $taille && $taille > 0) {
		// Calcul de l'IMC
		$imc =$poids /($taille * $taille)*10000;

		// On peut formater l'IMC à 2 décimales
		$context->imc = $imc;
		
		if (isset($_SESSION['user_id'])) {
			/// Enregistrement dans la base de données
			$user_id = $_SESSION['user_id'];
			$result = imcTable::addImc($user_id, $poids, $taille, $imc);
			// Retourne le succès avec les données calculées
		
		}
		return context::SUCCESS;
		
	} else {
		// Si les paramètres sont manquants ou incorrects
		$context->errorMessage = "Veuillez entrer un poids et une taille valides.";
		return context::ERROR;
	}
}

   public static function showTMB($request, $context) {
        $poids = isset($_POST['poids']) ? (float)$_POST['poids'] : null;
        $taille = isset($_POST['taille']) ? (float)$_POST['taille'] : null;
        $sexe = isset($_POST['sexe']) ? $_POST['sexe'] : null;
		$age = isset($_POST['age']) ? $_POST['age'] : null;
		
        // Ajout de debug pour voir les valeurs soumises
        error_log("Poids: " . $poids);
        error_log("Taille: " . $taille);
       

        // Calculer le TMB
        if($poids&&$taille&&$sexe&&$age){
        if($sexe =='homme'){
            // Calcul pour les hommes
            $mb = 88.36 + (13.4 * $poids) + (4.8 * $taille) - (5.7 * $age);
        }else{
            // Calcul pour les femmes
            $mb = 447.6 + (9.2 * $poids) + (3.1 * $taille) - (4.3 * $age);
        }
        
        if (isset($_SESSION['user_id'])) {
			/// Enregistrement dans la base de données
			$user_id = $_SESSION['user_id'];
			$result = bmrTable::addBmr($user_id, $poids, $taille, $age, $sexe, $mb);
		}
        
        $context->mb = $mb;

        // Passer le résultat à la vue
        return context::SUCCESS;
        }else{
            $context->errorMessage = "Veuillez entrer un poids et une taille valides.";
            return context::ERROR;
        }

    }

    
    
    public static function moduleModification($request, $context) {
		$identifiant = $_POST['login2'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
 
		$utilisateur=userTable::modifMdp($identifiant,$old_password,$new_password);
		if($utilisateur==null){
			$context->result="ton ancien mot de passe est incorrecte ";
			
		}
		else{
		$context->utilisateur=$utilisateur;
		$context->result="a modifié le mot de passe avec succés";
	}
	return context::SUCCESS;
		 
		
		}
		
		
    public static function showHistorique($request, $context)
{
	
	$user_id = $_SESSION['user_id']; 

    // Récupérer l'historique IMC et TMB
    $imcResults = imcTable::getImcByUserId($user_id);
    $bmrResults = BMRTable::getBmrByUserId($user_id);
	$context->imcResults=$imcResults;
	$context->bmrResults=$bmrResults;
	$context->user_id=$user_id;
	return context::SUCCESS;
		
}
}
