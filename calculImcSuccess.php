<div class="container">
    <h2>Résultat du calcul de votre IMC</h2>

    <?php if (isset($context->imc)): ?>
        <p>Votre indice de masse corporelle (IMC) est : <strong><?= round($context->imc, 2); ?></strong></p>

        <?php
        // Définir le niveau d'IMC selon l'OMS
        $imc = $context->imc;
        $interpretation = "";

        if ($imc < 18.5) {
            $interpretation = "Insuffisance pondérale (maigreur)";
        } elseif ($imc >= 18.5 && $imc < 25) {
            $interpretation = "Corpulence normale";
        } elseif ($imc >= 25 && $imc < 30) {
            $interpretation = "Surpoids";
        } elseif ($imc >= 30 && $imc < 35) {
            $interpretation = "Obésité modérée";
        } elseif ($imc >= 35 && $imc < 40) {
            $interpretation = "Obésité sévère";
        } else {
            $interpretation = "Obésité morbide ou massive";
        }
        ?>

        <p>Interprétation selon l'OMS : <strong><?= $interpretation; ?></strong></p>
        
    <?php else: ?>
        <p>Erreur lors du calcul de l'IMC. Veuillez vérifier les informations fournies.</p>
    <?php endif; ?>

    <br><br>
    <a href="IMC.php">Retour au calcul</a>
</div>
