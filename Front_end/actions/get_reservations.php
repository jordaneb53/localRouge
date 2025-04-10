<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';
require $_SERVER["DOCUMENT_ROOT"] . '/config/session.php';
// Exemple de récupération de la catégorie et de la durée
$sql = "SELECT Id_categories, titre, duree FROM categories";
$stmt = $conn->query($sql);
$categories = [];

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categories[] = [
            'Id_categories' => $row['Id_categories'],
            'titre' => $row['titre'],
            'duree' => $row['duree'] // Format "HH:MM:SS"
        ];
    }
}

echo json_encode($categories);
?>