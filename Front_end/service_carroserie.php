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
        <?php include_once 'modal_inscription.php';
        include_once 'modal_connexion.php'; ?>
        <section class="cards-container">
            <div class="card">
                <h2>CARROSSERIE</h2>
                <img src="assets/image/carroserie.jpg" alt="réparation en carrosserie sur véhicule automobile">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous pour un devis</button>
                </a>
            </div>
            <div class="card">
                <h2>RAYURES</h2>
                <img src="assets/image/rayure.jpg" alt="Petite réparation sur un véhicule automobile">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous pour un devis</button>
                </a>
            </div>
            <div class="card">
                <h2>PEINTURES</h2>
                <img src="assets/image/peinture.jpg" alt="Peintures automobile">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous pour un devis</button>
                </a>
            </div>
            <div class="card">
                <h2>JANTES</h2>
                <img src="assets/image/jante.jpg" alt="Réparation jantes">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous pour un devis</button>
                </a>
            </div>
        </section>
    </main>
    <?php include_once 'template/footer.php'; ?>
</body>


</html>