<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';
require $_SERVER["DOCUMENT_ROOT"] . '/config/session.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateurs WHERE email_utilisateurs = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si le mot de passe est correct
        if (password_verify($password, $user['mot_de_passe_utilisateurs'])) {

            // Vérifie si l'utilisateur a confirmé son compte
            if (!$user['confirmation']) {
                $result = [
                    "status" => "error",
                    "message" => "Veuillez valider votre inscription via le lien envoyé par email."
                ];
            } else {
                // Connexion réussie 
                $_SESSION['nom'] = $user['nom_utilisateurs'];
                $_SESSION['prenom'] = $user['prenom_utilisateurs'];
                $_SESSION['email'] = $user['email_utilisateurs'];
                $_SESSION['avatar'] = $user['avatar'];
                $_SESSION['id'] = $user['Id_utilisateurs'];
                $_SESSION['garage_solidaire'] = $user['garage_solidaire'];

                $result = ["status" => "success"];
            }

        } else {
            $result = ["status" => "error", "message" => "Identifiant ou mot de passe incorrect."];
        }

    } else {
        $result = ["status" => "error", "message" => "Identifiant ou mot de passe incorrect."];
    }

    echo json_encode($result);
}
