<?php
header('Content-Type: application/json'); // 👈 Dis au navigateur qu'on retourne du JSON

require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php'; // 👈 Utilise ta connexion centralisée

try {
    // Requête pour récupérer les marques
    $stmt = $conn->prepare("SELECT id_marques, nom_marques FROM marques ORDER BY nom_marques");
    $stmt->execute();
    $marques = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($marques); // 👈 Envoie la réponse en JSON
} catch (PDOException $e) {
    // Envoie une erreur JSON si la connexion échoue
    echo json_encode(['error' => $e->getMessage()]);
}
?>