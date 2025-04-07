<?php
session_start();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/generique.css">
    <script src="assets/js/script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <title>Service mécanique /Garage MNS</title>
</head>

<body>
    <?php include('template/header.php'); ?>
    <main>
        <section class="cards-container">
            <div class="card">
                <h2>PNEUS</h2>
                <img src="assets/image/pneu2.jpg" alt="changement d'un pneu">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>FREINS</h2>
                <img src="assets/image/freins.jpg" alt="changement d'un freins">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>AMORTISSEURS</h2>
                <img src="assets/image/amortisseurs.jpg" alt="changement d'amortisseurs">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>VIDANGE</h2>
                <img src="assets/image/vidange.jpg" alt="vidange">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>FILTRES</h2>
                <img src="assets/image/filtres.jpg" alt="changement d'un filtre">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>RÉVISION</h2>
                <img src="assets/image/revision.jpg" alt="révision">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>BATTERIRE</h2>
                <img src="assets/image/batterie.jpg" alt="changement d'une batterie">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>ÉCLAIRAGE</h2>
                <img src="assets/image/eclairage.jpg" alt="éclairage">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
                <a href="planning_solidaire.php" target="_blank">
                    <button class="btn_solidaire">Prendre un rendez-vous</button>
                </a>
            </div>
        </section>
    </main>
    <?php include_once 'template/footer.php'; ?>
</body>

</html>