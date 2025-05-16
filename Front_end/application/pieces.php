<?php
// Connexion à la base de données
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';
// Requête SQL pour récupérer les pièces
$query = "
    SELECT 
        tp.nom_pieces, 
        tp.marque_pieces, 
        tp.model_pieces, 
        tp.reference_pieces, 
        tp.Id_operations, 
        o.nom_operations 
    FROM 
        type_pieces tp
    JOIN 
        operations o ON tp.Id_operations = o.Id_operations
";
$stmt = $conn->query($query);

// Vérifier si des résultats sont retournés
if ($stmt->rowCount() > 0) {
    // Récupérer les résultats sous forme de tableau associatif
    $pieces = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les résultats au format JSON
    echo json_encode($pieces);
} else {
    // Si aucune pièce n'est trouvée, renvoyer un tableau vide
    echo json_encode([]);
}
?>