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

	public static function updateLastLogin($login,$pass) {
		$em = dbconnection::getInstance()->getEntityManager() ;
		
		$userRepository = $em->getRepository('users');
		$user = $userRepository->findOneBy(array('email' => $login, 'password_hash' =>$pass));	
		
		$user->last_login=new \DateTime();
		$em->persist($user);
		$em->flush();
		

		return $user; 
	}

	public static function addUser($login,$pass) {
		$em = dbconnection::getInstance()->getEntityManager() ;
		
		$userRepository = $em->getRepository('users');

  		$existingUser = $userRepository->findOneBy(['email' => $login]);

   		if ($existingUser) {
       			return "Erreur: Utilisateur existant";
    		}

		$user = new users();
        $user->setEmail($login);
        $user->setPassword_hash($pass);
        $user->last_login = new \DateTime();
        
		$em->persist($user);
		$em->flush();
		
		return $user; 
	}
	
	public static function modifMdp($login,$old_pass,$new_pass) {
		$em = dbconnection::getInstance()->getEntityManager() ;
		
		$userRepository = $em->getRepository('users');
		$user = $userRepository->findOneBy(['email' => $login]);
		 if ($user->password_hash!= $old_pass) {
			return null;
			
		}
		$user->setPassword_hash($new_pass);
		$em->persist($user);
		$em->flush();
		

		return $user; 
	}
	
	

  
}


?>