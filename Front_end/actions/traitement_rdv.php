<?php
session_start();

require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

// Vérification de la méthode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Méthode non autorisée.');
}

// Validation des champs attendus
if (
    empty($_POST['Id_operations']) ||
    empty($_POST['Id_vehicule']) ||
    empty($_POST['date_debut']) ||
    empty($_POST['heure_debut'])
) {
    die('Erreur : données du formulaire incomplètes.');
}

// Nettoyage / typage des données
$Id_operations = (int) $_POST['Id_operations'];
$Id_vehicule = (int) $_POST['Id_vehicule'];
$date_debut = trim($_POST['date_debut']);
$heure_debut = trim($_POST['heure_debut']);

// Vérification que l'utilisateur est bien connecté
if (!isset($_SESSION['user']['Id_utilisateur'])) {
    die('Erreur : utilisateur non authentifié.');
}

$Id_utilisateur = (int) $_SESSION['user']['Id_utilisateur'];

try {
    // Vérifier que le véhicule appartient bien à l'utilisateur
    $sql = "SELECT COUNT(*) FROM vehicules WHERE Id_vehicule = :id AND Id_utilisateur = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $Id_vehicule, PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $Id_utilisateur, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->fetchColumn() == 0) {
        die('Erreur : ce véhicule ne vous appartient pas.');
    }

    // Vérification si le créneau est déjà réservé
    $sql = "SELECT COUNT(*) FROM reservation WHERE date_debut = :date_debut AND heure_debut = :heure_debut";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':date_debut', $date_debut);
    $stmt->bindParam(':heure_debut', $heure_debut);
    $stmt->execute();

    if ($stmt->fetchColumn() > 0) {
        die('Erreur : ce créneau est déjà pris.');
    }

    // Transaction pour garantir l'intégrité des données
    $conn->beginTransaction();

    // Insertion dans table reservation
    $sql = "INSERT INTO reservation (date_debut, heure_debut, Id_vehicule) VALUES (:date_debut, :heure_debut, :Id_vehicule)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':date_debut', $date_debut);
    $stmt->bindParam(':heure_debut', $heure_debut);
    $stmt->bindParam(':Id_vehicule', $Id_vehicule);
    $stmt->execute();

    $Id_reservation = $conn->lastInsertId();

    // Lier la réservation à l'opération choisie
    $sql = "INSERT INTO reservation_operations (Id_reservation, Id_operations) VALUES (:Id_reservation, :Id_operations)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Id_reservation', $Id_reservation, PDO::PARAM_INT);
    $stmt->bindParam(':Id_operations', $Id_operations, PDO::PARAM_INT);
    $stmt->execute();

    // Tout est bon, on valide la transaction
    $conn->commit();

    // Redirection après succès
    header('Location: /service_mecanique.php?success=1');
    exit();
} catch (Exception $e) {
    $conn->rollBack();
    // Pour debug uniquement : ne jamais afficher l’erreur brute en production
    die('Une erreur est survenue : ' . $e->getMessage());
}
