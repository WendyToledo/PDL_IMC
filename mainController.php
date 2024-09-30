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
}
