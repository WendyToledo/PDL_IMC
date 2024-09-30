<?php
// Inclusion de la classe utilisateur
require_once "users.class.php";

class userTable {

  public static function getUserByLoginAndPass($login,$pass) {
		$em = dbconnection::getInstance()->getEntityManager() ;
		
		$userRepository = $em->getRepository('users');
		$user = $userRepository->findOneBy(array('email' => $login, 'password_hash' =>$pass));	
		
		

		return $user; 
	}
	

  
}


?>