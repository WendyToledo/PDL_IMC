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

            // Retourne le succès avec les données calculées
            return context::SUCCESS;
        } else {
            // Si les paramètres sont manquants ou incorrects
            $context->errorMessage = "Veuillez entrer un poids et une taille valides.";
            return context::ERROR;
        }
    }

    public static function calculTauxMeta($user){
        if($user->gender =='male'){
            // Calcul pour les hommes
            $mb = 88.36 + (13.4 * $user->weight) + (4.8 * $user->height) - (5.7 * $user->age);
        }else{
            // Calcul pour les femmes
            $mb = 447.6 + (9.2 * $user->weight) + (3.1 * $user->height) - (4.3 * $user->age);
        }
        return $mb;
    }
    public function showTMB($request) {
        // Créer un utilisateur à partir des données du formulaire
        $user = new User($request['age'], $request['weight'], $request['height'], $request['gender']);

        // Calculer le TMB
        $context->mb = calculTauxMeta($user);

        // Passer le résultat à la vue
        return context::SUCCESS;
    }
}
