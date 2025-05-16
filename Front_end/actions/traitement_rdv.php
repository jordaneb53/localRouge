<?php


require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id_operations = $_POST['Id_operations'];
    $Id_vehicule = $_POST['Id_vehicule'];
    $date_debut = $_POST['date_debut'];
    $heure_debut = $_POST['heure_debut'];


    // Pour récuperer le nom de l'opération avec son id
    $sql = "SELECT nom_operations FROM operations WHERE Id_operations = :id_operation";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_operation', $Id_operations, PDO::PARAM_INT);
    $stmt->execute();

    $operation = $stmt->fetch(PDO::FETCH_ASSOC);


    $sql = "INSERT INTO reservation (date_debut, heure_debut, Id_vehicule) VALUES (:date_debut, :heure_debut, :Id_vehicule)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':date_debut', $date_debut, PDO::PARAM_STR);
    $stmt->bindParam(':heure_debut', $heure_debut, PDO::PARAM_STR);
    $stmt->bindParam(':Id_vehicule', $Id_vehicule, PDO::PARAM_INT);
    $stmt->execute();
    // récupere Id_reservation de la derniere reservation
    $Id_reservation = $conn->lastInsertId();

    // inserer Id_reservation et Id_operations dans la table reservation_operations
    $sql = 'INSERT INTO reservation_operations (Id_reservation, Id_operations) VALUES (:Id_reservation, :Id_operations)';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Id_reservation', $Id_reservation, PDO::PARAM_INT);
    $stmt->bindParam(':Id_operations', $Id_operations, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: /service_mecanique.php');
    exit();
}

