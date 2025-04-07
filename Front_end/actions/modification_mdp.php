<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $reponse_secrete_soumise = $_POST['reponse_secrete'];
    $nouveau_mot_de_passe = $_POST['nouveau_mot_de_passe'];

    // Récupérer les informations de l'utilisateur depuis la base de données
    $stmt = $pdo->prepare("SELECT id, reponse_secrete_hash FROM utilisateurs WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        // Vérifier si la réponse secrète soumise est correcte
        if (password_verify($reponse_secrete_soumise, $utilisateur['reponse_secrete_hash'])) {
            // Si la réponse est correcte, hacher le nouveau mot de passe
            $nouveau_mot_de_passe_hash = password_hash($nouveau_mot_de_passe, PASSWORD_BCRYPT);

            // Mettre à jour le mot de passe dans la base de données
            $stmt = $pdo->prepare("UPDATE utilisateurs SET mot_de_passe = :mot_de_passe WHERE id = :id");
            $stmt->execute([
                ':mot_de_passe' => $nouveau_mot_de_passe_hash,
                ':id' => $utilisateur['id']
            ]);

            echo "Le mot de passe a été modifié avec succès.";
        } else {
            echo "La réponse à la question secrète est incorrecte.";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/generique.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/toogle.js" defer></script>
    <title>Demande de réinitialisation</title>
</head>

<body>
    <form action="boite_mail.php" method="GET" class="form-container-mdp">
        <h2>Réinitialiser le mot de passe</h2>
        <div class="form-group-mdp">
            <p>Nous vous avons envoyé un e-mail contenant un lien vous permettant de modifier votre mot de passe.
                Veuillez vérifier votre boîte de réception (et vos spams si nécessaire).</p>

        </div>
        <div class="form-group-mdp">
            <label for="email">Adresse e-mail <span class="required">*</span>:</label>
            <input type="email" id="email" name="email" placeholder="Votre adresse email" required>
        </div>

        <div class="form-group-mdp">
            <button type="submit" id="btn">Envoyer</button>
        </div>
    </form>

</body>

</html>