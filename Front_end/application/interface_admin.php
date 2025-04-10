<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="interface.css">
    <script src="script.app.js" defer></script>

    <title>Administration MNS GARAGE</title>
</head>

<body>
    <header>
        <h1>Admin MNS GARAGE</h1>
        <ul>
            <li><a href="logout.php">Déconnexion</a></li>
            <li>
                <a href="#">Profils ▾</a>
                <ul class="sousMenu">
                    <li><a href="interface_admin.php">Admin</a></li>
                    <li><a href="interface_employe.php">Employés</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <main>
        <div class="container">
            <ul class="nav-bar">
                <li data-section="planning">Planning <i class="ri-calendar-schedule-line"></i></li>
                <li data-section="pieces">Pièces<i class="ri-tools-line"></i></li>
                <li data-section="clients">Clients<i class="ri-folder-user-line"></i></li>
                <li data-section="vo">V.O<i class="ri-roadster-line"></i></li>
                <li data-section="employes">Employés<i class="ri-user-3-line"></i></li>
                <li data-section="gestion">Gestion<i class="ri-line-chart-line"></i></li>
            </ul>
        </div>
        <div class="content-section active" id="planning">
            <h2>Planning</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
                <tr>
                    <td>2023-06-01</td>
                    <td>09:00</td>
                </tr>
                <tr>
                    <td>2023-06-02</td>
                    <td>10:00</td>
                </tr>
            </table>
        </div>
        <div class="content-section" id="pieces">
            <h2>Pièces</h2>
            <p>Contenu pour les pièces...</p>
        </div>
        <div class="content-section" id="clients">
            <h2>Clients</h2>
            <p>Contenu pour les clients...</p>
        </div>
        <div class="content-section" id="vo">
            <h2>V.O</h2>
            <p>Contenu pour les véhicules d'occasion...</p>
        </div>
        <div class="content-section" id="employes">
            <h2>Employés</h2>
            <p>Contenu pour les employés...</p>
        </div>
        <div class="content-section" id="gestion">
            <h2>Gestion</h2>
            <p>Contenu pour la gestion...</p>
        </div>
    </main>
</body>

</html>