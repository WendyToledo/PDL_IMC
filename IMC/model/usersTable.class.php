<?php
// Inclusion de la classe utilisateur
require_once "users.class.php";

class userTable {

  	public static function getUserByLoginAndPass($login, $pass) {
	$em = dbconnection::getInstance()->getEntityManager();

	// Récupérer l'utilisateur par email (login)
	$userRepository = $em->getRepository('users');
	$user = $userRepository->findOneBy(['email' => $login]);

	// Si l'utilisateur existe, vérifier le mot de passe
	if ($user && password_verify($pass, $user->getPassword_hash())) {
		return $user; // Retourner l'utilisateur si la vérification est réussie
	}

	return null; // Retourner null si l'utilisateur n'existe pas ou si le mot de passe est incorrect
}

public static function getUserByLogin($login)
{
	$em = dbconnection::getInstance()->getEntityManager();
	$userRepository = $em->getRepository('users');
	return $userRepository->findOneBy(['email' => $login]);
}


	public static function updateLastLogin($userId) {
	$em = dbconnection::getInstance()->getEntityManager();

	// Récupérer l'utilisateur par son ID
	$userRepository = $em->getRepository('users');
	$user = $userRepository->find($userId);

	if ($user) {
		// Mettre à jour la colonne last_login
		$user->last_login = new \DateTime();

		// Persister les modifications
		$em->persist($user);
		$em->flush();

		return $user; // Retourne l'utilisateur mis à jour
	}

	// Retourner null si l'utilisateur n'est pas trouvé
	return null;
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
