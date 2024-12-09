
<?php
// Inclusion de la classe utilisateur
require_once "imc.class.php";

class imcTable {

    // Ajout d'un nouvel IMC
    public static function addImc($user_id, $weight, $height, $imc) {
        $em = dbconnection::getInstance()->getEntityManager();

        // Recherche de l'utilisateur par ID
        $userRepository = $em->getRepository('users');
        $user = $userRepository->find($user_id);

        if (!$user) {
            return "Erreur: Utilisateur non trouvé";
        }

        // Création d'un nouvel objet IMC
        $newImc = new IMC();
        $newImc->user = $user;
        $newImc->weight = $weight;
        $newImc->height = $height / 100; // Conversion de la taille en mètres
        $newImc->calculated_imc = $imc;
        $newImc->taken_at = new \DateTime(); // Date actuelle

        // Persistance dans la base de données
        $em->persist($newImc);
        $em->flush();

        return $newImc;
    }

    // Récupérer l'historique des IMC pour un utilisateur donné
    public static function getImcByUserId($user_id) {
        $em = dbconnection::getInstance()->getEntityManager();

        // Recherche de l'utilisateur par ID
        $userRepository = $em->getRepository('users');
        $user = $userRepository->find($user_id);

        if (!$user) {
            return null; // L'utilisateur n'existe pas
        }

        // Récupérer tous les enregistrements IMC associés à cet utilisateur
        $imcRepository = $em->getRepository('IMC');
        $imcResults = $imcRepository->findBy(['user' => $user], ['taken_at' => 'DESC']); // Tri par date décroissante

        return $imcResults;
    }
}
?>
