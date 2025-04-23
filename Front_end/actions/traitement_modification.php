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
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$immatriculation = $_POST['immatriculation'];
$annee = $_POST['annee'];
$couleur = $_POST['couleur'];
$kilometrage = $_POST['kilometrage'];
$motorisation = $_POST['motorisation'];

// Récupérer le mot de passe actuel
$sql = "SELECT mot_de_passe_utilisateurs FROM utilisateurs WHERE Id_utilisateurs = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Utilisateur non trouvé");
}

// Vérifier l'ancien mot de passe
if (!password_verify($ancienMdp, $user['mot_de_passe_utilisateurs'])) {
    die("Ancien mot de passe incorrect !");
}

// Vérifier que les nouveaux mots de passe correspondent
if ($nouveauMdp !== $confirmeMdp) {
    die("Les nouveaux mots de passe ne correspondent pas !");
}

// Hacher le nouveau mot de passe
$hashedPassword = password_hash($nouveauMdp, PASSWORD_DEFAULT);

// Mettre à jour les infos utilisateur
$sql = "UPDATE utilisateurs 
        SET nom_utilisateurs = :nom,
            prenom_utilisateurs = :prenom,
            adresse_utilisateurs = :adresse,
            code_postal = :code_postal,
            ville_utilisateurs = :ville,
            email_utilisateurs = :email,
            mot_de_passe_utilisateurs = :newPassword,
            garage_solidaire = :garageSolidaire
        WHERE Id_utilisateurs = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':adresse', $adresse);
$stmt->bindParam(':code_postal', $code_postal);
$stmt->bindParam(':ville', $ville);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':newPassword', $hashedPassword);
$stmt->bindParam(':garageSolidaire', $garageSolidaire, PDO::PARAM_INT);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// Mettre à jour le véhicule (il faut d’abord trouver l’ID du véhicule lié à l’utilisateur)
$sql = "SELECT Id_vehicule FROM utilisateurs_vehicules WHERE Id_utilisateurs = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$vehicule = $stmt->fetch(PDO::FETCH_ASSOC);

if ($vehicule) {
    $idVehicule = $vehicule['Id_vehicule'];

    $sql = "UPDATE vehicules 
            SET marque_vehicules = :marque,
                modele_vehicules = :modele,
                immatriculation = :immatriculation,
                annee = :annee,
                couleur = :couleur,
                kilometrage = :kilometrage,
                motorisation = :motorisation
            WHERE Id_vehicule = :idVehicule";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':marque', $marque);
    $stmt->bindParam(':modele', $modele);
    $stmt->bindParam(':immatriculation', $immatriculation);
    $stmt->bindParam(':annee', $annee);
    $stmt->bindParam(':couleur', $couleur);
    $stmt->bindParam(':kilometrage', $kilometrage);
    $stmt->bindParam(':motorisation', $motorisation);
    $stmt->bindParam(':idVehicule', $idVehicule, PDO::PARAM_INT);
    $stmt->execute();
}

echo "Toutes les informations ont été mises à jour avec succès.";
// Redirection possible : header('Location: profil.php');
?>