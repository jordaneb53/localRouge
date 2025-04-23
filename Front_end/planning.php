<?php
session_start();
if (empty($_SESSION['id'])) {
    header('Location: /projet_fil_rouge/front_end/index.php');
    exit();
}
if (isset($_GET['id']) && isset($_GET['titre'])) {
    // Récupérer l'ID et le titre
    $id = $_GET['id'];
    $titre = $_GET['titre'];
    $duree = $_GET['duree'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/CSS/generique.css">
    <script src="assets/js/calendrier.js" defer></script>
    <script src="assets/js/script.js" defer></script>
    <title>Réservation de rendez-vous</title>
</head>

<body>
    <?php include('template/header.php'); ?>
    <main>
        <div class="rdv">
            <h1 data-duree="<?php echo htmlspecialchars($_GET['duree']); ?>"
                data-titre="<?php echo htmlspecialchars($titre); ?>">
                Prendre votre rendez-vous
            </h1>

            <p>Assurez-vous que votre jour et heure soit disponible !</p>
        </div>
        <div class="calendar">
            <div class="navigation">
                <button id="prevWeek">← Précédent</button>
                <span id="currentWeek">Semaine du 10 au 14 octobre 2023</span>
                <button id="nextWeek">Suivant →</button>
            </div>
            <div class="schedule" id="scheduleContainer">
            </div>
        </div>
    </main>
    <!-- Modal RDV -->
    <div id="modalRdv" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Prendre un rendez-vous</h2>
            <form id="formRdv">
                <label>Type de réparation :</label>
                <input type="text" id="typeReparation" name="typeReparation" value="<?= htmlspecialchars($titre) ?>"
                    readonly>

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

    <?php include('template/footer.php'); ?>
</body>

</html>