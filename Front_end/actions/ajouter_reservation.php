<?php
session_start();
require_once 'db.php'; // ton fichier de connexion PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sécurité & récupération des données
    $type = $_POST['typeReparation'] ?? '';
    $date = $_POST['dateRdv'] ?? '';
    $horaire = $_POST['horaireRdv'] ?? '';
    $id_employe = $_SESSION['id']; // employé connecté

    // Séparer heure de début et heure de fin si format "08:00 - 09:00"
    $heures = explode(' - ', $horaire);
    $heure_debut = $heures[0] ?? null;
    $heure_fin = $heures[1] ?? null;

    if ($type && $date && $heure_debut && $heure_fin && $id_employe) {
        try {
            $stmt = $pdo->prepare("INSERT INTO reservation (type_reparation, dateRdv, heure_debut, heure_fin, Id_employes) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$type, $date, $heure_debut, $heure_fin, $id_employe]);
            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Champs manquants']);
    }
}
