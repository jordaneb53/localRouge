<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $ville = htmlspecialchars($_POST['ville']);
    $codePostal = htmlspecialchars($_POST['codePostale']);
    $email = htmlspecialchars($_POST['email']);
    $mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);
    $confirme_mot_de_passe = htmlspecialchars($_POST['confirme_mot_de_passe']);
    $accepter_conditions = isset($_POST['accepter_conditions']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $avatar = htmlspecialchars($_POST['avatar']);
    $garage_solidaire = isset($_POST['garage_solidaire']) ? 1 : 0;
    $token = bin2hex(random_bytes(16)); // Token d'activation unique
    $expiration = date('Y-m-d H:i:s', time() + 86400); // 24 heures
    $confirmation = 0;

    // Validation des champs
    if (
        empty($nom) || empty($prenom) || empty($adresse) || empty($ville) || empty($codePostal) ||
        empty($email) || empty($mot_de_passe) || empty($confirme_mot_de_passe) || !$accepter_conditions
    ) {
        echo "Veuillez remplir tous les champs obligatoires.";
        return;
    }

    if ($mot_de_passe !== $confirme_mot_de_passe) {
        echo "Les mots de passe ne correspondent pas.";
        return;
    }

    // Regex et validations avancées
    if (!preg_match("/^[a-zA-ZÀ-ÿ\-\'\s]+$/", $nom)) {
        echo "Le nom contient des caractères non valides.";
        return;
    }

    if (!preg_match("/^[a-zA-ZÀ-ÿ\-\'\s]+$/", $prenom)) {
        echo "Le prénom contient des caractères non valides.";
        return;
    }

    if (!preg_match("/^[a-zA-Z0-9À-ÿ\s,'\-\.]{5,}$/", $adresse)) {
        echo "L'adresse semble invalide.";
        return;
    }

    if (!preg_match("/^[a-zA-ZÀ-ÿ0-9\-\'\s]+$/", $ville)) {
        echo "La ville contient des caractères non valides.";
        return;
    }

    if (!preg_match("/^\d{5}$/", $codePostal)) {
        echo "Le code postal doit contenir 5 chiffres.";
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        return;
    }

    if (!preg_match("/^0[1-9]\d{8}$/", $telephone)) {
        echo "Numéro de téléphone invalide.";
        return;
    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $mot_de_passe)) {
        echo "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.";
        return;
    }

    if ($mot_de_passe !== $confirme_mot_de_passe) {
        echo "Les mots de passe ne correspondent pas.";
        return;
    }

    if (!in_array($avatar, ['un', 'deux', 'trois'])) {
        echo "Avatar non valide.";
        return;
    }

    // Hash du mot de passe
    $mot_de_passe_hashe = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // Connexion à la base de données avec PDO
    try {
        require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php'; // Assure-toi que la connexion PDO est correcte

        // Vérification si l'email existe déjà
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email_utilisateurs = :email");
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();
        $emailExiste = $checkStmt->fetchColumn();

        if ($emailExiste > 0) {
            echo "Cette adresse email est déjà utilisée. Veuillez en choisir une autre.";
            return;
        }

        // Insertion de l'utilisateur dans la base de données avec statut "non validé"
        $stmt = $conn->prepare("INSERT INTO utilisateurs (nom_utilisateurs, prenom_utilisateurs, adresse_utilisateurs, ville_utilisateurs, code_postal, mot_de_passe_utilisateurs, telephone_utilisateurs, email_utilisateurs, avatar, garage_solidaire, token, token_expiration ,confirmation) 
            VALUES (:nom, :prenom, :adresse, :ville, :code_postal, :mot_de_passe, :telephone, :email, :avatar, :garage_solidaire, :token, :token_expiration, :confirmation)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':code_postal', $codePostal);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe_hashe);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);

        // Avatar
        $avatars = [
            'un' => 'assets/image/avatar1.png',
            'deux' => 'assets/image/avatar2.png',
            'trois' => 'assets/image/avatar3.png'
        ];

        $avatarFinal = isset($avatars[$avatar]) ? $avatars[$avatar] : $avatars['un'];
        $stmt->bindParam(':avatar', $avatarFinal);
        $stmt->bindParam(':garage_solidaire', $garage_solidaire, PDO::PARAM_BOOL);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':token_expiration', $expiration);
        $stmt->bindParam(':confirmation', $confirmation);

        if ($stmt->execute()) {
            $utilisateur_id = $conn->lastInsertId();

            if ($utilisateur_id == 0) {
                throw new Exception("Erreur : ID utilisateur est 0 après insertion.");
            }


            // Définir le rôle en fonction de garage_solidaire
            $role_id = $garage_solidaire ? 4 : 3; // 1 = client_solidaire, 0 = client_fidel
            echo "ID nouvel utilisateur : " . $utilisateur_id;
            // Insérer dans la table pivot role_utilisateurs
            $stmtRole = $conn->prepare("INSERT INTO role_utilisateurs (Id_utilisateurs, Id_role) VALUES (:Id_utilisateurs, :Id_role)");
            $stmtRole->bindParam(':Id_utilisateurs', $utilisateur_id);
            $stmtRole->bindParam(':Id_role', $role_id);


            $stmtRole->execute();

            // Redirection
            header("Location: /actions/validation_inscription.php?token=$token");
            exit();
        } else {
            echo "❌ Échec de l'insertion dans la table utilisateurs<br>";
            print_r($stmt->errorInfo()); // affiche le message d'erreur SQL exact
            return;
        }

    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}

?>