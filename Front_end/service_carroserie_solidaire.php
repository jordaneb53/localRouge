<?php
session_start();


require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';
// Récupérer les catégories
$sql = "SELECT * FROM operations WHERE service_mecanique = 1";
$stmt = $conn->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/generique.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <script src="assets/js/script.js" defer></script>
    <title>Service carrosserie/Garage MNS</title>
</head>

<body>
    <?php include_once 'template/header.php'; ?>
    <main>
        <section class="cards-container">
            <?php foreach ($categories as $categorie): ?>
                <div class="card">
                    <h2><?= htmlspecialchars($categorie['nom_operations']) ?></h2>
                    <img src="<?= htmlspecialchars($categorie['images']) ?>"
                        alt="<?= htmlspecialchars($categorie['nom_operations']) ?>">
                    <?php if (empty($_SESSION['id'])) { ?>
                        <button class="connecsession">Prendre un rendez-vous</button>
                    <?php } else { ?>
                        <a href="/planning.php?id=<?= $categorie['Id_operations'] ?>&titre=<?= urlencode($categorie['nom_operations']) ?>&duree=<?= htmlspecialchars($categorie['duree']) ?>"
                            target="_blank">
                            <button>Prendre un rendez-vous </button>
                        </a>
                        <a href="/planning_solidaire.php?id=<?= $categorie['Id_operations'] ?>&titre=<?= urlencode($categorie['nom_operations']) ?>&duree=<?= htmlspecialchars($categorie['duree']) ?>"
                            target="_blank">
                            <button class="btn_solidaire">Prendre un rendez-vous solidaire</button>
                        </a>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <?php include_once 'template/footer.php'; ?>
</body>


</html>