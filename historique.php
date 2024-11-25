<?php
// Vérifie si une session est déjà active avant d'appeler session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (isset($_SESSION['user_id'])) {
    // Récupérer l'ID de l'utilisateur
    $user_id = $_SESSION['user_id']; 

    // Récupérer l'historique IMC et TMB
    $imcResults = imcTable::getImcByUserId($user_id);
    $bmrResults = BMRTable::getBmrByUserId($user_id);
?>
    <h3>Historique IMC</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Date</th>
                <th>Poids (kg)</th>
                <th>Taille (cm)</th>
                <th>IMC Calculé</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($imcResults)) : ?>
                <?php foreach ($imcResults as $imc): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($imc->taken_at->format('Y-m-d H:i')); ?></td>
                        <td><?php echo htmlspecialchars($imc->weight); ?></td>
                        <td><?php echo htmlspecialchars($imc->height * 100); ?> cm</td>
                        <td><?php echo number_format($imc->calculated_imc, 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">Aucun historique IMC disponible.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h3>Historique TMB</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Date</th>
                <th>Poids (kg)</th>
                <th>Taille (cm)</th>
                <th>Âge</th>
                <th>Sexe</th>
                <th>TMB Calculé</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($bmrResults)) : ?>
                <?php foreach ($bmrResults as $bmr): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($bmr->taken_at->format('Y-m-d H:i')); ?></td>
                        <td><?php echo htmlspecialchars($bmr->weight); ?></td>
                        <td><?php echo htmlspecialchars($bmr->height * 100); ?> cm</td>
                        <td><?php echo htmlspecialchars($bmr->age); ?></td>
                        <td><?php echo ucfirst(htmlspecialchars($bmr->gender)); ?></td>
                        <td><?php echo number_format($bmr->calculated_bmr, 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">Aucun historique TMB disponible.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php
} else {
    // Si l'utilisateur n'est pas connecté, masquer cette section
    echo "<p>Veuillez vous connecter pour afficher votre historique.</p>";
}
?>
