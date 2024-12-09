
<?php
// bmrTable.class.php : Gère les opérations sur la table BMR

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


    // Récupérer l'historique des IMC pour un utilisateur donné
    public static function getBmrByUserId($user_id) {
        $em = dbconnection::getInstance()->getEntityManager();

        // Recherche de l'utilisateur par ID
        $userRepository = $em->getRepository('users');
        $user = $userRepository->find($user_id);

        if (!$user) {
            return null; // L'utilisateur n'existe pas
        }

        // Récupérer tous les enregistrements IMC associés à cet utilisateur
        $imcRepository = $em->getRepository('BMR');
        $imcResults = $imcRepository->findBy(['user' => $user], ['taken_at' => 'DESC']); // Tri par date décroissante

        return $imcResults;
    }
}
?>