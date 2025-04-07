<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php'; // Connexion PDO
require $_SERVER["DOCUMENT_ROOT"] . '/config/session.php';

$nom = null;
$prenom = null;
$message = null;
$token = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['valider_inscription'])) {
    $token = $_POST['token'] ?? null;

    if ($token) {
        $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE token = :token AND confirmation = 0");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $expiration = strtotime($user['token_expiration']);
            $maintenant = time();

            if ($expiration > $maintenant) {
                // Met à jour confirmation à 1 et supprime le token
                $update = $conn->prepare("UPDATE utilisateurs SET confirmation = 1, token = NULL, token_expiration = NULL WHERE Id_utilisateurs = :id");
                $update->bindParam(':id', $user['Id_utilisateurs']);
                $update->execute();

                $nom = htmlspecialchars($user['nom_utilisateurs']);
                $prenom = htmlspecialchars($user['prenom_utilisateurs']);
            } else {
                $message = "Le lien de validation a expiré. Veuillez recommencer l'inscription.";
            }
        } else {
            $message = "Lien invalide ou déjà utilisé.";
        }
    } else {
        $message = "Token manquant.";
    }
} elseif (isset($_GET['token'])) {
    $token = $_GET['token'];

    // On récupère les infos même sans valider
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE token = :token AND confirmation = 0");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $expiration = strtotime($user['token_expiration']);
        $maintenant = time();

        if ($expiration > $maintenant) {
            $nom = htmlspecialchars($user['nom_utilisateurs']);
            $prenom = htmlspecialchars($user['prenom_utilisateurs']);
        } else {
            $message = "Le lien de validation a expiré. Veuillez recommencer l'inscription.";
        }
    } else {
        $message = "Lien invalide ou déjà utilisé.";
    }
} else {
    $message = "Token manquant.";
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Validation d'inscription</title>
</head>

<body>
    <h1>Validation d'inscription</h1>

    <?php if ($nom && $prenom && $_SERVER["REQUEST_METHOD"] !== "POST"): ?>
        <h3>Madame/Monsieur <?php echo $nom . " " . $prenom; ?></h3>
        <p>Merci pour votre inscription à MNS GARAGE. Pour finaliser, cliquez sur le bouton ci-dessous.</p>
        <form method="post" action="">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <button type="submit" name="valider_inscription">Valider mon inscription</button>
        </form>

    <?php elseif ($nom && $prenom && $_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <h3>Madame/Monsieur <?php echo $nom . " " . $prenom; ?></h3>
        <p>Votre compte a bien été validé !</p>
        <a href="../index.php"><button>Retour à l'accueil</button></a>

    <?php else: ?>
        <p><?php echo $message; ?></p>
        <a href="../modal_inscription.php"><button>Recommencer l'inscription</button></a>
    <?php endif; ?>


    <p>La direction MNS GARAGE</p>
    <p>&copy; 2025</p>
</body>

</html>