<?php

session_start();
include_once '../config/db.php';

if (empty($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}

$id = $_SESSION['id'];

// Récupérer les données utilisateur
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$code_postal = $_POST['code_postal'];
$ville = $_POST['ville'];
$email = $_POST['email'];
$ancienMdp = $_POST['mot_de_passe_profil'];
$nouveauMdp = $_POST['nouveau_mot_de_passe_profil'];
$confirmeMdp = $_POST['Confirme_mdp_profil'];
$garageSolidaire = isset($_POST['garage_solidaire']) ? 1 : 0;

// Récupérer les données véhicule
$idMarque = isset($_POST['Id_marques']) ? $_POST['Id_marques'] : null;
$idModele = isset($_POST['Id_modeles']) ? $_POST['Id_modeles'] : null;
$immatriculation = $_POST['immatriculation'];
$annee = $_POST['annee'];
$couleur = $_POST['couleur'];
$kilometrage = $_POST['kilometrage'];

// Récupérer le mot de passe actuel
$sql = "SELECT mot_de_passe_utilisateurs FROM utilisateurs WHERE Id_utilisateurs = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Utilisateur non trouvé");
}
$changePassword = false;

if (!empty($nouveauMdp) || !empty($confirmeMdp)) {
    // Vérifier que les nouveaux mots de passe correspondent
    if ($nouveauMdp !== $confirmeMdp) {
        die("Les nouveaux mots de passe ne correspondent pas !");
    }
    $changePassword = true;
}

// Prépare la requête SQL de mise à jour
$sql = "UPDATE utilisateurs 
        SET nom_utilisateurs = :nom,
            prenom_utilisateurs = :prenom,
            adresse_utilisateurs = :adresse,
            code_postal = :code_postal,
            ville_utilisateurs = :ville,
            email_utilisateurs = :email,
            garage_solidaire = :garageSolidaire";

if ($changePassword) {
    $sql .= ", mot_de_passe_utilisateurs = :newPassword";
}

$sql .= " WHERE Id_utilisateurs = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':adresse', $adresse);
$stmt->bindParam(':code_postal', $code_postal);
$stmt->bindParam(':ville', $ville);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':garageSolidaire', $garageSolidaire, PDO::PARAM_INT);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($changePassword) {
    $hashedPassword = password_hash($nouveauMdp, PASSWORD_DEFAULT);
    $stmt->bindParam(':newPassword', $hashedPassword);
}

$stmt->execute();

// Mettre à jour le véhicule (trouver l’ID du véhicule lié à l’utilisateur)
$sql = "SELECT Id_vehicule FROM vehicules WHERE Id_utilisateurs = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$vehicule = $stmt->fetch(PDO::FETCH_ASSOC);



if ($idMarque === null || $idModele === null) {
    die("Les données de marque ou modèle sont manquantes.");
}

if ($vehicule) {
    $idVehicule = $vehicule['Id_vehicule'];

    $sql = "UPDATE vehicules 
    SET Id_marques = :idMarque,
        Id_modeles = :idModele,
        immatriculation = :immatriculation,
        annee = :annee,
        couleur = :couleur,
        kilometrage = :kilometrage
    WHERE Id_vehicule = :idVehicule";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idMarque', $idMarque);
    $stmt->bindParam(':idModele', $idModele);
    $stmt->bindParam(':immatriculation', $immatriculation);
    $stmt->bindParam(':annee', $annee);
    $stmt->bindParam(':couleur', $couleur);
    $stmt->bindParam(':kilometrage', $kilometrage);
    $stmt->bindParam(':idVehicule', $idVehicule, PDO::PARAM_INT);
    $stmt->execute();
}


echo "Toutes les informations ont été mises à jour avec succès.";
// Redirection possible : header('Location: profil.php');
?>