<?php
session_start();
include_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $marque = $_POST['marques'];
    $modele = $_POST['modele_vehicules'];
    $immatriculation = $_POST['immatriculation'];
    $annee = $_POST['annee'];
    $couleur = $_POST['couleur'];
    $kilometrage = $_POST['kilometrage'];
    $id_utilisateur = $_POST['id_utilisateur'];

    try {
        $conn->beginTransaction();

        // 1. Récupérer ou insérer la marque
        $stmt = $conn->prepare("SELECT Id_marques FROM marques WHERE nom_marques = :nom");
        $stmt->execute([':nom' => $marque]);
        $marque_data = $stmt->fetch(PDO::FETCH_ASSOC);

        $id_marque = $_POST['marques']; // doit être un ID de marque
        $id_modele = $_POST['modele_vehicules']; // doit être un ID de modèle lié à cette marque
        // 2. Récupérer ou insérer le modèle
        $stmt = $conn->prepare("SELECT Id_modeles FROM modeles WHERE nom_modele = :nom AND Id_marques = :id_marque");
        $stmt->execute([':nom' => $modele, ':id_marque' => $id_marque]);
        $modele_data = $stmt->fetch(PDO::FETCH_ASSOC);

        // 4. Insérer le véhicule
        $stmt = $conn->prepare("
            INSERT INTO vehicules (immatriculation, annee, couleur, kilometrage, Id_marques,  Id_utilisateurs, Id_modeles)
            VALUES (:immatriculation, :annee, :couleur, :kilometrage, :id_marque,  :id_utilisateur, :id_modele)
        ");
        $stmt->execute([
            ':immatriculation' => $immatriculation,
            ':annee' => $annee,
            ':couleur' => $couleur,
            ':kilometrage' => $kilometrage,
            ':id_marque' => $id_marque,
            ':id_utilisateur' => $id_utilisateur,
            ':id_modele' => $id_modele

        ]);
        $id_vehicule = $conn->lastInsertId();  // Récupérer l'ID du véhicule inséré

        // 6. Valider la transaction
        $conn->commit();

        header("Location: ../profil.php");
        exit();

    } catch (Exception $e) {
        $conn->rollBack();
        echo "Erreur lors de l’ajout du véhicule : " . $e->getMessage();
    }
} else {
    header("Location: ../profil.php");
    exit();
}
?>