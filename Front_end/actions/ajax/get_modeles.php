<?php
// Connexion à la base de données
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

if (isset($_POST['id_marques'])) {
    $id_marques = $_POST['id_marques'];  // Récupère l'ID de la marque

    // Requête pour récupérer les modèles en fonction de l'ID de la marque
    $stmt = $conn->prepare("SELECT id_modeles, nom_modele FROM modeles WHERE id_marques = :id_marques ORDER BY nom_modele");
    $stmt->bindParam(':id_marques', $id_marques);
    $stmt->execute();

    $models = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($models);
} else {
    echo json_encode(['error' => 'Marque non définie']);
}
