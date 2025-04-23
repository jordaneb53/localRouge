<?php
session_start();
include_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $marque = $_POST['marque_vehicules'];
    $modele = $_POST['modele_vehicules'];
    $motorisation = $_POST['motorisation'];  // Ajout du champ motorisation
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

        if ($marque_data) {
            $id_marque = $marque_data['Id_marques'];
        } else {
            $stmt = $conn->prepare("INSERT INTO marques (nom_marques) VALUES (:nom)");
            $stmt->execute([':nom' => $marque]);
            $id_marque = $conn->lastInsertId();
        }

        // 2. Récupérer ou insérer le modèle
        $stmt = $conn->prepare("SELECT Id_modeles FROM modeles WHERE nom_modele = :nom AND Id_marques = :id_marque");
        $stmt->execute([':nom' => $modele, ':id_marque' => $id_marque]);
        $modele_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($modele_data) {
            $id_modele = $modele_data['Id_modeles'];
        } else {
            $stmt = $conn->prepare("INSERT INTO modeles (nom_modele, Id_marques) VALUES (:nom, :id_marque)");
            $stmt->execute([':nom' => $modele, ':id_marque' => $id_marque]);
            $id_modele = $conn->lastInsertId();
        }

        // 3. Récupérer ou insérer la motorisation
        $stmt = $conn->prepare("SELECT Id_motorisation FROM motorisation WHERE nom_motorisation = :motorisation");
        $stmt->execute([':motorisation' => $motorisation]);
        $motorisation_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($motorisation_data) {
            $id_motorisation = $motorisation_data['Id_motorisation'];
        } else {
            $stmt = $conn->prepare("INSERT INTO motorisation (nom_motorisation) VALUES (:motorisation)");
            $stmt->execute([':motorisation' => $motorisation]);
            $id_motorisation = $conn->lastInsertId();
        }

        // 4. Insérer le véhicule
        $stmt = $conn->prepare("
            INSERT INTO vehicules (immatriculation, annee, couleur, kilometrage, Id_marques, Id_modeles, Id_utilisateurs)
            VALUES (:immatriculation, :annee, :couleur, :kilometrage, :id_marque, :id_modele, :id_utilisateur)
        ");
        $stmt->execute([
            ':immatriculation' => $immatriculation,
            ':annee' => $annee,
            ':couleur' => $couleur,
            ':kilometrage' => $kilometrage,
            ':id_marque' => $id_marque,
            ':id_modele' => $id_modele,
            ':id_utilisateur' => $id_utilisateur
        ]);
        $id_vehicule = $conn->lastInsertId();  // Récupérer l'ID du véhicule inséré

        // 5. Associer le modèle à la motorisation dans model_motorisation
        $stmt = $conn->prepare("
            INSERT INTO model_motorisation (Id_modeles, Id_motorisation)
            VALUES (:id_modele, :id_motorisation)
        ");
        $stmt->execute([
            ':id_modele' => $id_modele,
            ':id_motorisation' => $id_motorisation
        ]);

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