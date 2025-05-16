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

                $getVehicule = $conn->prepare('SELECT * FROM utilisateurs INNER JOIN vehicules ON utilisateurs.Id_utilisateurs = vehicules.Id_utilisateurs INNER JOIN marques ON vehicules.Id_marques = marques.Id_marques INNER JOIN modeles ON vehicules.Id_modeles = modeles.Id_modeles WHERE utilisateurs.Id_utilisateurs = :id');
                $getVehicule->bindParam(':id', $_SESSION['id']);
                $getVehicule->execute();
                $recupVehic = $getVehicule->fetch(PDO::FETCH_ASSOC);

                $_SESSION['vehicules'] = [
                    'Id_vehicule' => $recupVehic['Id_vehicule'],
                    'marque_vehicules' => $recupVehic['nom_marques'],
                    'modele_vehicules' => $recupVehic['nom_modele'],
                    'immatriculation' => $recupVehic['immatriculation'],
                    'annee' => $recupVehic['annee']
                ];

                // $_SESSION['vehicules'] = $user['vehicules'];

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
