<?php
// Inclusion de la classe utilisateur
require_once "imc.class.php";

class imcTable {

	public static function addImc($user_id,$weight,$height,$imc) {
		$em = dbconnection::getInstance()->getEntityManager() ;
		
		$userRepository = $em->getRepository('users');
		$user = $userRepository->find($user_id);
		
		if (!$user) {
			return "Erreur: Utilisateur non trouvé";
		}


		$newImc = new IMC();
        $newImc->user = $user;
        $newImc->weight = $weight;
        $newImc->height = $height/100;
        $newImc->calculated_imc = $imc;
        $newImc->taken_at = new \DateTime();
        
		$em->persist($newImc);
		$em->flush();
		
		return $newImc; 
		
	}
	
	

  
}


?>
