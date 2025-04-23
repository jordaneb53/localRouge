<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['teste'])) {  // Vérification si le bouton "Mettre à jour" a bien été cliqué
        // Capture des données du formulaire
        $id = $_POST['falseId'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $code_postal = $_POST['code_postal'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $garage_solidaire = $_POST['garage_solidaire'];

        // Assure-toi que la requête UPDATE est correcte
        $updateStmt = $conn->prepare("UPDATE utilisateurs SET nom_utilisateurs = ?, prenom_utilisateurs = ?, adresse_utilisateurs = ?, ville_utilisateurs = ?, code_postal = ?, telephone_utilisateurs = ?, email_utilisateurs = ?, garage_solidaire = ? WHERE Id_utilisateurs = ?");
        $updateStmt->execute([$nom, $prenom, $adresse, $ville, $code_postal, $telephone, $email, $garage_solidaire, $id]);

        // Si la mise à jour réussit, afficher un message
        echo "Client mis à jour avec succès.";

        // Rediriger après mise à jour
        header('Location: interface_admin.php');
        exit;
    } else {
        echo "Le bouton de mise à jour n'a pas été cliqué.";
    }
}

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


        </div>


        <div class="content-section" id="pieces">
            <h2>Pièces</h2>
            <p>Contenu pour les pièces...</p>
        </div>
        <!-- Modale de modification client -->
        <div class="content-section active" id="clients">
            <div id="wrapper"></div> <!-- Pour GridJS -->
        </div>

        <!-- En dehors de #clients -->
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