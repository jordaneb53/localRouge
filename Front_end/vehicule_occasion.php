<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';
$stmt = $conn->prepare("SELECT * FROM vehicules_occasions WHERE date_vente IS NULL");
$stmt->execute();
$vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <?php foreach ($vehicules as $v):
                $photos = array_filter(explode(',', $v['photo']));
                $photoPrincipale = trim($photos[0]);
                $dataImages = htmlspecialchars(implode(',', $photos));
                ?>
                <div class="card" data-km="<?= $v['kilometrage_occasion'] ?>" data-prix="<?= $v['prix'] ?>">
                    <img src="<?= htmlspecialchars($photoPrincipale) ?>" alt="<?= htmlspecialchars($v['description']) ?>">
                    <h3><?= htmlspecialchars($v['marque_occasion']) . ' ' . htmlspecialchars($v['model_occasion']) ?></h3>
                    <p><?= htmlspecialchars($v['description']) ?></p>

                    <button class="btn-detail btn-open-modal" data-img="<?= htmlspecialchars($photoPrincipale) ?>"
                        data-images="<?= $dataImages ?>" data-marque="<?= htmlspecialchars($v['marque_occasion']) ?>"
                        data-model="<?= htmlspecialchars($v['model_occasion']) ?>"
                        data-titre="<?= htmlspecialchars($v['description']) ?>"
                        data-km="<?= number_format($v['kilometrage_occasion'], 0, ',', ' ') ?> km"
                        data-prix="<?= number_format($v['prix'], 0, ',', ' ') ?> €"
                        data-historique="<?= htmlspecialchars($v['historique']) ?>"
                        data-etat="<?= htmlspecialchars($v['etat']) ?>"
                        data-date="<?= htmlspecialchars($v['date_achat']) ?>">
                        Voir le détail
                    </button>
                </div>

            <?php endforeach; ?>
        </section>

        <!-- Modal -->
        <div id="modalVehicule" class="modalVehicule">
            <div class="modal-content">
                <span class="closeVehicule">&times;</span>
                <!-- Ajouter un conteneur pour les images et les flèches de navigation -->
                <div class="modal-image-container">
                    <button class="prev" id="prevImage">&lt;</button>
                    <img id="modal-img" src="" alt="Image du véhicule">
                    <button class="next" id="nextImage">&gt;</button>
                </div>
                <h3 id="modal-marque-model"></h3>
                <p id="modal-description"></p>
                <p id="modal-km"></p>
                <p id="modal-prix"></p>
                <p id="modal-historique"></p>
                <p id="modal-etat"></p>
                <p id="modal-date"></p>
            </div>
        </div>

    </main>
    <?php include("template/footer.php"); ?>
</body>

</html>