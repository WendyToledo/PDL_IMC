<?php if ($context->imc): ?>
    <div class="resultat-container">
        <h2>Votre IMC : <?=$context->imc ?></h2>

        <?php
        // Récupération de l'IMC depuis le contexte
        $imc = $context->imc;

        // Détermination de la catégorie de l'IMC selon les normes de l'OMS
        if ($imc < 18.5) {
            $categorie = "Insuffisance pondérale (maigreur)";
        } elseif ($imc >= 18.5 && $imc < 25) {
            $categorie = "Corpulence normale";
        } elseif ($imc >= 25 && $imc < 30) {
            $categorie = "Surpoids";
        } elseif ($imc >= 30 && $imc < 35) {
            $categorie = "Obésité modérée";
        } elseif ($imc >= 35 && $imc < 40) {
            $categorie = "Obésité sévère";
        } else {
            $categorie = "Obésité morbide ou massive";
        }
        ?>

        <p>Interprétation de votre IMC selon l'organization mondiale de la santé OMS : <strong><?= $categorie ?></strong></p>

        <div class="imc-interpretation">
            <h3>Interprétation des résultats de l'IMC :</h3>
            <ul>
                <li><strong>Moins de 18,5 :</strong> Insuffisance pondérale (maigreur)</li>
                <li><strong>18,5 à 25 :</strong> Corpulence normale</li>
                <li><strong>25 à 30 :</strong> Surpoids</li>
                <li><strong>30 à 35 :</strong> Obésité modérée</li>
                <li><strong>35 à 40 :</strong> Obésité sévère</li>
                <li><strong>Plus de 40 :</strong> Obésité morbide ou massive</li>
            </ul>
        </div>

    </div>
<?php else: ?>
    <div class="error-message">
        <h2>Erreur lors du calcul de l'IMC</h2>
        <p><?= isset($context->errorMessage) ? $context->errorMessage : "Veuillez vérifier les informations fournies et réessayer." ?></p>
    </div>
<?php endif; ?>
