<?php
session_start();
if (empty($_SESSION['id'])) {
    header('Location: /projet_fil_rouge/front_end/index.php');
    exit();
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
    <title>Réservation de rendez-vous</title>
</head>

<body>
    <?php include('template/header.php'); ?>
    <main>
        <div class="rdv">
            <h1>Prendre votre rendez-vous</h1>
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
    <?php include('template/footer.php'); ?>
</body>

</html>