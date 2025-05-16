<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

$stmt = $conn->query("SELECT Id_utilisateurs, nom_utilisateurs, prenom_utilisateurs, adresse_utilisateurs, email_utilisateurs FROM utilisateurs");
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($utilisateurs);
?>