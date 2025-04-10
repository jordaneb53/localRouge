<?php
session_start();

$idClient = $_SESSION['id']; // vérifie que cette session existe bien

require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';



$req = $conn->prepare("SELECT marque_vehicules, modele_vehicules, immatriculation, annee FROM vehicules WHERE Id_utilisateurs  = ?");
$req->execute([$idClient]);
$vehicule = $req->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($vehicule);
