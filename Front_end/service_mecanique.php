<?php
session_start();


// Paramètres de connexion
$host = 'localhost'; // Vérifie si c'est bien localhost ou une autre adresse
$dbname = 'mnsgarage'; // Nom de ta base de données
$username = 'root'; // Nom d'utilisateur (par défaut sur WAMP)
$password = ''; // Mot de passe (vide par défaut sur WAMP)

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Afficher un message d'erreur et stopper l'exécution du script
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer les catégories
$sql = "SELECT * FROM categories";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$testeRecup = "ok";
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/generique.css">
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/calendrier.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <title>Service mécanique /Garage MNS</title>
</head>

<body>
    <?php include("template/header.php"); ?>
    <main>
        <?php include_once 'modal_inscription.php';
        include_once 'modal_connexion.php'; ?>
        <section class="cards-container">
            <?php foreach ($categories as $categorie): ?>
                <div class="card">
                    <h2><?= htmlspecialchars($categorie['titre']) ?></h2>
                    <img src="<?= htmlspecialchars($categorie['images']) ?>"
                        alt="<?= htmlspecialchars($categorie['titre']) ?>">
                    <?php if (empty($_SESSION['id'])) { ?>
                        <button class="connecsession">Prendre un rendez-vous</button>
                    <?php } else { ?>
                        <a href="/planning.php?id=<?= $categorie['Id_categories'] ?>&titre=<?= urlencode($categorie['titre']) ?>&duree=<?= htmlspecialchars($categorie['duree']) ?>"
                            target="_blank">
                            <button>Prendre un rendez-vous </button>
                        </a>

                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <?php include("template/footer.php"); ?>
</body>

</html>