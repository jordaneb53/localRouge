<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

// Vérifie si l'utilisateur existe dans la table utilisateurs
$utilisateur_id = $_SESSION['id'];
$sql_user_check = "SELECT * FROM utilisateurs WHERE Id_utilisateurs = :utilisateur_id";
$stmt_user_check = $conn->prepare($sql_user_check);
$stmt_user_check->bindParam(':utilisateur_id', $utilisateur_id);
$stmt_user_check->execute();
$user_exists = $stmt_user_check->fetch(PDO::FETCH_ASSOC);

if (!$user_exists) {
    echo "Erreur : l'utilisateur n'existe pas dans la base de données.";
    exit();
}

// Vérifie si les données sont envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $immatriculation = htmlspecialchars($_POST['immatriculation']);
    $annee = (int) $_POST['annee'];
    $couleur = htmlspecialchars($_POST['couleur']);
    $kilometrage = (int) $_POST['kilometrage'];
    $Id_utilisateurs = $_SESSION['id'];

    // Vérifie si l'immatriculation existe déjà
    $sql_check = "SELECT * FROM vehicules WHERE immatriculation = :immatriculation";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bindParam(':immatriculation', $immatriculation);
    $stmt_check->execute();

    if ($stmt_check->rowCount() > 0) {
        echo "Ce véhicule est déjà enregistré.";
        exit();
    }

    // Insère le véhicule dans la table vehicules (ajout de la vérification pour l'utilisateur)
    $sql = "INSERT INTO vehicules (marque_vehicules, modele_vehicules, immatriculation, annee, couleur, kilometrage, motorisation, Id_utilisateurs)
VALUES (:marque_vehicules, :modele_vehicules, :immatriculation, :annee, :couleur, :kilometrage, :motorisation, :Id_utilisateurs)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':immatriculation', $immatriculation);
    $stmt->bindParam(':annee', $annee);
    $stmt->bindParam(':couleur', $couleur);
    $stmt->bindParam(':kilometrage', $kilometrage);
    $stmt->bindParam(':Id_utilisateurs', $Id_utilisateurs);
    $stmt->bindParam(':marque_vehicules', $_POST['marque_vehicules']);
    $stmt->bindParam(':modele_vehicules', $_POST['modele_vehicules']);
    $stmt->bindParam(':motorisation', $_POST['motorisation']);

    if ($stmt->execute()) {
        // Récupère l'ID du véhicule ajouté
        $vehicule_id = $conn->lastInsertId();

        // Ajoute l'association dans la table utilisateurs_vehicules
        $sql_assoc = "INSERT INTO utilisateurs_vehicules (Id_utilisateurs, Id_vehicule)
VALUES (:Id_utilisateurs, :Id_vehicule)";
        $stmt_assoc = $conn->prepare($sql_assoc);
        $stmt_assoc->bindParam(':Id_utilisateurs', $Id_utilisateurs);
        $stmt_assoc->bindParam(':Id_vehicule', $vehicule_id);

        if ($stmt_assoc->execute()) {
            header("Location: ../profil.php?success=1");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'association utilisateur-véhicule.";
        }
    } else {
        echo "Erreur lors de l'ajout du véhicule.";
    }
}