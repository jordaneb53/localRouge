<?php
header('Content-Type: application/json');

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=garage', 'root', '');

// Requête pour récupérer les rendez-vous à venir
$query = $pdo->query("SELECT id, client, date_rdv FROM rendezvous WHERE date_rdv >= NOW() ORDER BY date_rdv ASC LIMIT 5");
$notifications = $query->fetchAll(PDO::FETCH_ASSOC);

// Renvoi des notifications en JSON
echo json_encode($notifications);
?>