<?php if ($context->mb): ?>
    <div class="resultat-container">
        <h2>Votre MB : <?=$context->mb ?> kcal/jour</h2>

        <?php
        // Récupération du mb depuis le contexte
        $mb = $context->mb;
       
        ?>

        <div class="mb-interpretation">
            <h3>Interprétation des résultats du taux métabolique :</h3>
            <ul>
                <li><strong>Sédentaire :</strong> Aucun exercice quotidien ou presque <?php echo $mb*1.2;?> </li>
                <li><strong>Légèrement actif :</strong> Vous faites parfois des exercices physiques (1 à 3 fois par semaine) <?php echo $mb*1.375;?></li>
                <li><strong>Actif :</strong> Vous faites régulièrement des exercices physiques (3 à 5 fois par semaine) <?php echo $mb*1.55;?></li>
                <li><strong>Très actif :</strong> Vous faites quotidiennement du sport ou des exercices physiques soutenus <?php echo $mb*1.725;?></li>
                <li><strong>Extrêmement actif :</strong> Votre travail est extrêmement physique ou bien vous vous considérez comme un grand sportif <?php echo $mb*1.9;?></li>
            </ul>
        </div>

    </div>
<?php else: ?>
    <div class="error-message">
        <h2>Erreur lors du calcul du taux métabolique</h2>
        <p><?= isset($context->errorMessage) ? $context->errorMessage : "Veuillez vérifier les informations fournies et réessayer." ?></p>
    </div>
<?php endif; ?>