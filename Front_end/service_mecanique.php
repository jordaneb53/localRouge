<?php
session_start();

require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';
// Récupérer les catégories
$sql = "SELECT * FROM operations WHERE service_mecanique = 0";
$stmt = $conn->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);



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
    <?php include("template/header.php"); ?>
    <?php if (!empty($_SESSION['vehicule'])): ?>
        data-vehicule="<?= htmlspecialchars($_SESSION['vehicule']) ?>"
    <?php endif; ?>>
    <main>
        <?php include_once 'modal_inscription.php';
        include_once 'modal_connexion.php'; ?>
        <section class="cards-container">
            <?php foreach ($categories as $categorie): ?>
                <div class="card" data-id-operation="<?= $categorie['Id_operations'] ?>">
                    <h2><?= htmlspecialchars($categorie['nom_operations']) ?></h2>
                    <img src="<?= htmlspecialchars($categorie['images']) ?>"
                        alt="<?= htmlspecialchars($categorie['nom_operations']) ?>">
                    <label for="date_reservation">Sélectionnez une date</label>
                    <input type="date" id="date_reservation_<?= $categorie['Id_operations'] ?>" class="date-input">
                    <label for="heure_reservation">Sélectionnez une heure</label>
                    <input type="time" id="heure_reservation_<?= $categorie['Id_operations'] ?>" min="08:00" max="18:00"
                        step="900">

                    <?php if (empty($_SESSION['id'])) { ?>

                        <button class="connecsession">Prendre un rendez-vous</button>
                    <?php } else { ?>
                        <button>Prendre un rendez-vous </button>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
            <div id="modalRdv" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Prendre un rendez-vous</h2>
                    <form id="formRdv" action="/actions/traitement_rdv.php" method="post">

                        <label>Type de réparation :</label>
                        <input type="hidden" id="Id_operations" name="Id_operations">
                        <input type="hidden" id="Id_vehicule" name="Id_vehicule"
                            value="<?= $_SESSION['vehicules']['Id_vehicule'] ?>">
                        <input type="hidden" id="date_debut" name="date_debut">
                        <input type="hidden" id="heure_debut" name="heure_debut">
                        <input type="text" id="typeReparation" name="typeReparation" readonly>


                        <label>Date :</label>
                        <input type="text" id="dateRdv" name="dateRdv" readonly>


                        <label>Créneau horaire :</label>
                        <input type="text" id="horaireRdv" name="horaireRdv" readonly>


                        <label>Véhicule :</label>
                        <input type="text" id="vehiculeClient" name="vehiculeClient" readonly>



                        <button type="submit">Confirmer</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include("template/footer.php"); ?>
</body>

</html>