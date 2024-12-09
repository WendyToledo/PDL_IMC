<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';

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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = strtolower(trim(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL)));

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            // Vérifier si l'utilisateur existe
            $stmt = $pdo->prepare("SELECT id FROM users WHERE LOWER(email) = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user) {
                // Générer un token unique
                $token = bin2hex(random_bytes(16));
                $expiration = date("Y-m-d H:i:s", strtotime("+1 hour"));

                // Sauvegarder le token dans la table user
                $update_stmt = $pdo->prepare("UPDATE users SET reset_token = :token, token_expiration = :expiration WHERE id = :id");
                $update_stmt->execute(['token' => $token, 'expiration' => $expiration, 'id' => $user['id']]);

                // Envoyer l'e-mail
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ndeyetoutybeye22@gmail.com';
                $mail->Password = 'tqms zprb rwwa yqpm ';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('ndeyetoutybeye22@gmail.com', 'Calcul IMC');
                $mail->addAddress($email);

                $mail->SMTPDebug = 0; // Affiche les journaux de débogage complets


                $mail->isHTML(true);
                $mail->Subject = 'Réinitialisation de mot de passe';
                $mail->Body = "Bonjour,
                Vous avez demandé à réinitialiser votre mot de passe. Cliquez sur le lien ci-dessous pour procéder :
                <a href='https://pedago.univ-avignon.fr/~uapv2202361/calculIMC/password_reset.php?token=$token'>
                Réinitialiser mon mot de passe
                </a>
                Si vous n'avez pas fait cette demande, veuillez ignorer cet e-mail.
                
                --
                Ndeye Beye
                Université d'Avignon
";

                if ($mail->send()) {
					echo "Un mail a été envoyé à l'adresse saisie. Veuillez vérifier votre boîte de réception, ainsi que vos spams.";
				} else {
                    echo "Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
                }
            } else {
                echo "Aucun utilisateur trouvé pour l'email : " . htmlspecialchars($email);
            }
        } catch (PDOException $e) {
            echo "Erreur SQL : " . $e->getMessage();
        }
    } else {
        echo "Adresse e-mail invalide.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de réinitialisation de mot de passe</title>
</head>
<body>
<h1>Réinitialisez votre mot de passe</h1>
<form method="POST">
    <label for="email">Votre adresse e-mail :</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>
