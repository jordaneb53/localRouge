<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/generique.css">
    <script src="script.js" defer></script>


    <title>Réservation de rendez-vous</title>
</head>

<body>
    <?php include_once 'header.php'; ?>
    <main>
        <div class="rdv_solidaire">
            <h1>Prendre votre rendez-vous</h1>
            <p>Assurez-vous que votre jour et heure soit disponible !</p>
        </div>
        <div class="calendar">
            <div class="navigation">
                <button id="prevWeekSolidaire">← Précédent</button>
                <span id="currentWeek">Semaine du 10 au 14 octobre 2023</span>
                <button id="nextWeekSolidaire">Suivant →</button>
            </div>
            <div class="schedule" id="scheduleContainer">
                <!-- Les jours et heures seront ajoutés dynamiquement ici -->
            </div>
        </div>
    </main>
    <?php include_once 'footer.php'; ?>
</body>

</html>