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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="assets/js/script.js" defer></script>


    <title>Véhicules d'occasions /Garage MNS</title>
</head>

<body>
    <?php include("template/header.php"); ?>
    <main>
        <?php include_once 'modal_inscription.php';
        include_once 'modal_connexion.php'; ?>
        <div class="titreOccasion">
            <h1>Nos véhicules d'occasions</h1>
        </div>
        <div class="filtres">
            <div class="slider-container">
                <label for="kilometrage">Kilométrage: <span id="km-value">50000</span> km</label>
                <input type="range" id="kilometrage" class="slider" min="0" max="200000" step="1000" value="50000"
                    oninput="updateValue('km-value', this.value)">
            </div>

            <div class="slider-container">
                <label for="prix">Prix: <span id="prix-value">15000</span> €</label>
                <input type="range" id="prix" class="slider" min="500" max="200000" step="500" value="15000"
                    oninput="updateValue('prix-value', this.value)">
            </div>
        </div>

        <section class="cards-container">
            <div class="card">
                <img src="assets/image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="assets/image/MANHART-Golf-GTI-290-Website-1.png" alt="GTI MANHART">
                <h3>Golf GTI-MANHART</h3>
                <span>Kilométrage: 23000 km</span>
                <span>Prix: 59000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="assets/image/range-rover-evoque-assurance.jpg" alt="Range rover sport svr5.0">
                <h3>Range Rover Sport</h3>
                <span>Kilométrage: 42000 km</span>
                <span>Prix: 97000€</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="assets/image/S0-renault-arkana-2023-petite-mise-a-jour-et-finition-esprit-alpine-203316.png"
                    alt="RS6 ABT">
                <h3>Renault ARKANA E-TECH</h3>
                <span>Kilométrage: 64000 km</span>
                <span>Prix: 19000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="assets/image/exter-peugeot-308-0905js-2131-redimensionner.png" alt="RS6 ABT">
                <h3>Peugeot 308</h3>
                <span>Kilométrage: 86000km</span>
                <span>Prix: 14500 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="assets/image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="assets/image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="assets/image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="assets/image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="pagination">
                <button class="page-btn" onclick="changePage(-1)" id="prev-btn">Précédent</button>
                <div id="page-buttons"></div>
                <button class="page-btn" onclick="changePage(1)" id="next-btn">Suivant</button>
            </div>

    </main>
    <?php include("template/footer.php"); ?>
</body>

</html>