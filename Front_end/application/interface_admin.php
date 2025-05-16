<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

// Semaine courante
$debutSemaine = date('Y-m-d', strtotime('monday this week'));
$finSemaine = date('Y-m-d', strtotime('sunday this week'));

// // Récupérer toutes les réservations
// $stmt = $conn->prepare("SELECT r.*, v.immatriculation, e.nom_employes, e.prenom_employes 
//                        FROM reservation r
//                        LEFT JOIN vehicules v ON r.Id_vehicule = v.Id_vehicule
//                        LEFT JOIN employes e ON r.Id_employes = e.Id_employes
//                        WHERE r.date_fin BETWEEN :debut AND :fin");
// $stmt->execute([
//     'debut' => $debutSemaine,
//     'fin' => $finSemaine
// ]);
// $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// // Organisation pour accès rapide
// $reservation_map = [];

// foreach ($reservations as $res) {
//     $jour = date('N', strtotime($res['date_fin'])); // 1 = lundi, ..., 7 = dimanche
//     $heureDebut = strtotime($res['heure_debut']);
//     $heureFin = strtotime($res['heure_fin']);

//     // On liste tous les créneaux de 15 min entre début et fin
//     while ($heureDebut < $heureFin) {
//         $heure = date('H:i', $heureDebut);
//         $reservation_map[$jour][$heure][] = $res;
//         $heureDebut = strtotime('+15 minutes', $heureDebut);
//     }
// }
// ?>


?>
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
        <div class="content-section active" id="planning">
            <div class="table-container">
                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Heure</th>
                            <th>Lundi</th>
                            <th>Mardi</th>
                            <th>Mercredi</th>
                            <th>Jeudi</th>
                            <th>Vendredi</th>
                            <th>Samedi</th>
                            <th>Dimanche</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $start = strtotime('08:00');
                        for ($i = 0; $i <= 40; $i++) { // de 08:00 à 18:00
                            $time = date('H:i', $start + ($i * 15 * 60));
                            echo "<tr>";
                            echo "<td>$time</td>";

                            for ($day = 1; $day <= 7; $day++) {
                                echo "<td>";

                                if (!empty($reservation_map[$day][$time])) {
                                    foreach ($reservation_map[$day][$time] as $res) {
                                        echo "<div style='border-bottom: 1px solid #ccc; margin-bottom: 2px; padding-bottom: 2px;'>";
                                        echo "<strong>" . htmlspecialchars($res['operations']) . "</strong><br>";
                                        echo "<small>" . htmlspecialchars($res['immatriculation']) . "</small><br>";
                                        echo "<small>" . htmlspecialchars($res['nom_employes']) . " " . htmlspecialchars($res['prenom_eployes']) . "</small>";
                                        echo "</div>";
                                    }
                                }
                                echo "</td>";
                            }

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
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