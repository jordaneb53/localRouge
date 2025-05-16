<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM type_pieces WHERE id_pieces = ?");
    $stmt->execute([$id]);
    $piece = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($piece) {
        echo json_encode($piece);
    } else {
        echo json_encode(['success' => false, 'message' => 'Pièce introuvable']);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['Id_pieces'], $_POST['nom_pieces'], $_POST['marque_pieces'], $_POST['model_pieces'], $_POST['reference_pieces'], $_POST['Id_operations'])) {
        echo json_encode(['success' => false, 'message' => 'Champs manquants.']);
        exit;
    }

    $id = $_POST['id_pieces'];
    $nom = $_POST['nom_pieces'];
    $marque = $_POST['marque_pieces'];
    $model = $_POST['model_pieces'];
    $reference = $_POST['reference_pieces'];
    $operation = $_POST['id_operations'];

    try {
        $stmt = $conn->prepare("UPDATE type_pieces SET nom_pieces = ?, marque_pieces = ?, model_pieces = ?, reference_pieces = ?, Id_operations = ? WHERE Id_pieces = ?");
        $stmt->execute([$nom, $marque, $model, $reference, $operation, $id]);

        echo json_encode(['success' => true]);
        exit;
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur SQL : ' . $e->getMessage()]);
        exit;
    }
}
