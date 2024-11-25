<?php
require_once "bmr.class.php";

class bmrTable {

	public static function addBmr($user_id,$weight,$height,$age,$gender,$bmr) {
		$em = dbconnection::getInstance()->getEntityManager() ;
		
		$userRepository = $em->getRepository('users');
		$user = $userRepository->find($user_id);
		
		if (!$user) {
			return "Erreur: Utilisateur non trouvé";
		}


		$newBmr = new BMR();
        $newBmr->user = $user;
        $newBmr->weight = $weight;
        $newBmr->height = $height/100;
        $newBmr->age = $age;
        $newBmr->gender = $gender;
        $newBmr->calculated_bmr = $bmr;
        $newBmr->taken_at = new \DateTime();
        
		$em->persist($newBmr);
		$em->flush();
		
		return $newBmr; 
		
	}
	
	

  
}


?>
