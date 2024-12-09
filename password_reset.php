<?php
session_start();

// Connexion à la base de données
$host = 'pedago01c.univ-avignon.fr';
$dbname = 'etd';
$username = 'uapv2202361';
$password = 'CLVHmw';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérification des requêtes POST pour la réinitialisation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['token'], $_POST['new_password'], $_POST['confirm_password'])) {
        $token = trim($_POST['token']);
        $new_password = trim($_POST['new_password']);
        $confirm_password = trim($_POST['confirm_password']);

        // Vérifiez que les mots de passe correspondent
        if ($new_password !== $confirm_password) {
            die("Les mots de passe ne correspondent pas.");
        }

        try {
            // Vérifiez le token et récupérez l'utilisateur
            $query = "SELECT id, reset_token, token_expiration 
                      FROM users 
                      WHERE reset_token = :token 
                      AND token_expiration > NOW()";
            $stmt = $pdo->prepare($query);
            $stmt->execute(['token' => $token]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
				var_dump($new_password); // Vérifie si le mot de passe est bien transmis
                var_dump($user['id']);  // Vérifie l'ID récupéré de la base
                // Hachez le nouveau mot de passe
                //$hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

                // Mettez à jour le mot de passe et supprimez le token
                
                $update_query = "UPDATE users 
                                 SET password_hash = :password, 
                                     reset_token = NULL, 
                                     token_expiration = NULL 
                                 WHERE id = :id";
                $update_stmt = $pdo->prepare($update_query);
                $update_stmt->execute([
                    'password' => $new_password,
                    'id' => $user['id']
                ]);

                echo "Mot de passe réinitialisé avec succès.";
            } else {
                echo "Token invalide ou expiré.";
            }
        } catch (Exception $e) {
            echo "Erreur lors de la réinitialisation : " . $e->getMessage();
        }
    } else {
        echo "Données manquantes ou invalides.";
    }
}
// Affichage du formulaire pour entrer un nouveau mot de passe
elseif (isset($_GET['token'])) {
    $token = htmlspecialchars($_GET['token']);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Réinitialiser le mot de passe</title>
    </head>
    <body>
    <h1>Réinitialisez votre mot de passe</h1>
    <form method="POST">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <label for="new_password">Nouveau mot de passe :</label>
        <input type="password" id="new_password" name="new_password" required>
        <label for="confirm_password">Confirmez le mot de passe :</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <button type="submit">Réinitialiser</button>
    </form>
    </body>
    </html>
    <?php
} else {
    echo "Lien invalide.";
}
?>
