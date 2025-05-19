<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

// Semaine courante
$debutSemaine = date('Y-m-d', strtotime('monday this week'));
$finSemaine = date('Y-m-d', strtotime('sunday this week'));


// ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js" defer></script>
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
                <li data-section="planning">Planning <?php if (isset($tt)) {
                    echo $tt;
                } ?>
                    <i class="ri-calendar-schedule-line"></i>
                </li>
                <li data-section="pieces">Pièces<i class="ri-tools-line"></i></li>
                <li data-section="clients">Clients<i class="ri-folder-user-line"></i></li>
                <li data-section="vo">V.O<i class="ri-roadster-line"></i></li>
                <li data-section="employes">Employés<i class="ri-user-3-line"></i></li>
                <li data-section="gestion">Gestion<i class="ri-line-chart-line"></i></li>
            </ul>
        </div>
        <div class="content-section " id="planning">
            <div class="table-container">
                <div class="reservations">
                    <h2>Liste des Réservations</h2>

                    <table id="reservationTable" border="1" class="reservations">
                        <thead>
                            <tr>
                                <th>Type de réparation</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Immatriculation</th>
                                <th>Année</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="content-section" id="pieces">
            <div class="piecesContent">
                <h2>Pièces</h2>
                <table class="tablePieces">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Marque</th>
                            <th>Modèle</th>
                            <th>Référence</th>
                            <th>Opérations</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="piecesList"></tbody>
                </table>
            </div>
        </div>
        <!-- Modale de modification client -->
        <div class="content-section active" id="clients">
            <div id="wrapper"></div>
        </div>

        <div id="modal-client" class="modal-clients" style="display: none;">
            <div class="modal-content">
                <span class="close-clients">&times;</span>
                <div id="modal-body-clients"></div>
            </div>
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