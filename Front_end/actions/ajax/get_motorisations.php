<?php
// Connexion à la base de données
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

// Vérifier que l'ID du modèle est passé
if (isset($_POST['id_modeles'])) {
    $id_modeles = $_POST['id_modeles'];  // Récupère l'ID du modèle

    try {
        // Requête pour récupérer les motorisations associées au modèle via la table d'association
        $stmt = $conn->prepare("
            SELECT m.id_motorisation, m.nom_motorisation 
            FROM motorisation m
            JOIN model_motorisation mm ON m.id_motorisation = mm.id_motorisation
            WHERE mm.id_modeles = :id_modeles
            ORDER BY m.nom_motorisation
        ");
        $stmt->bindParam(':id_modeles', $id_modeles);
        $stmt->execute();

        $motorisations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Vérifier si des motorisations ont été trouvées
        if ($motorisations) {
            echo json_encode($motorisations);  // Retourner les motorisations en JSON
        } else {
            echo json_encode(['error' => 'Aucune motorisation trouvée']);
        }

    } catch (PDOException $e) {
        // En cas d'erreur SQL, renvoyer l'erreur en JSON
        echo json_encode(['error' => 'Erreur SQL: ' . $e->getMessage()]);
    }
} else {
    // Si l'ID du modèle n'est pas défini, renvoyer une erreur
    echo json_encode(['error' => 'Modèle non défini']);
}
