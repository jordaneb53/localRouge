<?php
// Supposons que vous avez récupéré la réponse de l'utilisateur et l'ID de l'utilisateur
$reponse_soumise = $_POST['reponse_secrete'];
$utilisateur_id = $_POST['utilisateur_id'];

// Récupérer le hachage de la réponse secrète depuis la base de données
$stmt = $pdo->prepare("SELECT reponse_secrete_hash FROM utilisateurs WHERE id = :id");
$stmt->execute([':id' => $utilisateur_id]);
$utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si la réponse est correcte
if (password_verify($reponse_soumise, $utilisateur['reponse_secrete_hash'])) {
    echo "La réponse est correcte.";
} else {
    echo "La réponse est incorrecte.";
}
?>