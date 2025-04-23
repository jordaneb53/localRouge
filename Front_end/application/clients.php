<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

$stmt = $conn->query("SELECT Id_utilisateurs, nom_utilisateurs, prenom_utilisateurs, adresse_utilisateurs, email_utilisateurs FROM utilisateurs");
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
<div id="wrapper"></div>

<script>
    // Données utilisateur passées via PHP
    const utilisateurs = <?php echo json_encode($utilisateurs); ?>;
    // Le script JS est chargé plus tard via le fichier script.app.js
</script>