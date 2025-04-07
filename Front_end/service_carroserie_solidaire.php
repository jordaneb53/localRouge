<?php
session_start();

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
            <div class="card">
                <h2>CARROSSERIE</h2>
                <img src="assets/image/carroserie.jpg" alt="réparation en carrosserie">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>RAYURES</h2>
                <img src="assets/image/rayure.jpg" alt="Petite réparation">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>PEINTURES</h2>
                <img src="assets/image/peinture.jpg" alt="Peintures">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>JANTES</h2>
                <img src="assets/image/jante.jpg" alt="Réparation jantes">
                <h3>Voir les produits</h3>
                <label for="selection" class="block mt-3 font-medium">Choisissez une option :</label>
                <select id="selection" class="w-full mt-1 p-2 border rounded-lg">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
    </main>
    <?php include_once 'template/footer.php'; ?>
</body>


</html>