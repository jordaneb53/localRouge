<?php
session_start();

$idClient = $_SESSION['id']; // vérifie que cette session existe bien

require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';



$req = $conn->prepare("
    SELECT 
        marques.nom_marques AS marque_vehicules,
        modeles.nom_modele AS modele_vehicules,
        vehicules.immatriculation,
        vehicules.annee
    FROM vehicules
    INNER JOIN modeles ON vehicules.Id_modeles = modeles.Id_modeles
    INNER JOIN marques ON modeles.Id_marques = marques.Id_marques
    WHERE vehicules.Id_utilisateurs = ?
");
$req->execute([$idClient]);
$vehicule = $req->fetch(PDO::FETCH_ASSOC);




header('Content-Type: application/json');
echo json_encode($vehicule);
