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
		if (empty($_POST['pseudo']) || empty($_POST['password'] || empty($_POST['password_verif'])) {
$context->errorMessage = "Tous les champs sont obligatoires.";
       			return context::ERROR;
    		}

		$identifiant = $_POST['pseudo'];
		$pass = $_POST['password'];
		$pass_verif = $_POST['password_verif'];

		if ($pass !== $pass_verif) {
        		$context->errorMessage = "Mots de passe différents";
        		return context::ERROR;
    		}

		$user = userTable::addUser ($identifiant, $pass);
		$_SESSION['user_id'] = $user->id;
		$context->utilisateur  =$user;
		return context::SUCCESS;
	}
}