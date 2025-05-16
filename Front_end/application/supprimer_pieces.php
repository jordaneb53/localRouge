<?php
// Afficher les erreurs pour le debug
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

// Connexion à la base
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

// Vérifie la méthode HTTP
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// Récupérer les données JSON
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID non fourni']);
    exit;
}

$id = intval($data['id']);

try {
    $stmt = $conn->prepare("DELETE FROM type_pieces WHERE Id_pieces = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Aucune pièce supprimée. ID introuvable.']);
        exit;
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur SQL : ' . $e->getMessage()]);
    exit;
}
