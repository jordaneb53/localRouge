<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

// Récupérer les données du formulaire
$nom_employes = $_POST['username'];
$mot_de_passe_employes = $_POST['password'];

// Requête pour vérifier les informations d'identification
$sql = "SELECT * FROM employes WHERE nom_employes = :nom AND mot_de_passe_employes = :mot_de_passe";
$stmt = $conn->prepare($sql);

// Utilisation correcte de bindParam avec PDO
$stmt->bindParam(':nom', $nom_employes, PDO::PARAM_STR);
$stmt->bindParam(':mot_de_passe', $mot_de_passe_employes, PDO::PARAM_STR);

$stmt->execute();
$result = $stmt->fetchAll();

// Vérifier si un utilisateur a été trouvé
if (count($result) > 0) {
    // Connexion réussie
    echo "Connexion réussie !";
    header('Location: interface_admin.php');
    exit(); // Assurez-vous de terminer le script après la redirection
} else {
    // Échec de la connexion
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}

// Fermer la connexion
$stmt = null;
$conn = null;
?>