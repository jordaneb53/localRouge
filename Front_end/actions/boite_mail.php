<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';
$message = "";
$email = $_GET["email"] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $new_password = $_POST["new_password"] ?? '';
    $confirm_password = $_POST["confirm_password"] ?? '';

    if (empty($new_password) || empty($confirm_password)) {
        $message = "Veuillez remplir tous les champs.";
    } elseif ($new_password !== $confirm_password) {
        $message = "Les mots de passe ne correspondent pas.";
    } else {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE utilisateurs SET mot_de_passe_utilisateurs = :password WHERE email_utilisateurs = :email");
        $stmt->execute([
            ":password" => $hashed_password,
            ":email" => $email
        ]);

        if ($stmt->rowCount()) {
            header("Location: ../index.php");
            exit();
        } else {
            $message = "Email introuvable ou mot de passe déjà à jour.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/CSS/generique.css">
    <script src="../assets/js/script.js" defer></script>
    <script src="../assets/js/toogle.js" defer></script>
    <title>Nouveau mot de passe</title>
</head>

<body>
    <form method="POST" action="boite_mail.php" class="form-container-mdp">
        <h2>Nouveau mot de passe</h2>
        <p>Merci de saisir votre nouveau mot de passe en respectant les critères de saisie <span id="passwordHelp"
                class="question-mark">?</span></p>
        <div id="passwordCriteriaModal" class="modal-criteria">
            <div class="modal-content-criteria">
                <span id="closeCriteriaModal" class="close-btn">&times;</span>
                <h2>Critères du mot de passe</h2>
                <ul>
                    <li id="crit-length">❌ Au moins 8 caractères</li>
                    <li id="crit-uppercase">❌ Une lettre majuscule</li>
                    <li id="crit-lowercase">❌ Une lettre minuscule</li>
                    <li id="crit-number">❌ Un chiffre</li>
                    <li id="crit-special">❌ Un caractère spécial (#?!@$%^&*-)</li>
                </ul>
            </div>
        </div>




        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <label for="new_password">Nouveau mot de passe<span class="required">*</span>:</label>
        <input type="password" name="new_password" placeholder="Nouveau mot de passe" required>
        <label for="confirm_password">Confirmer le mot de passe<span class="required">*</span>:</label>
        <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
        <button type="submit">Confirmer</button>

        <div class="message"><?php echo htmlspecialchars($message); ?></div>
    </form>
</body>

</html>