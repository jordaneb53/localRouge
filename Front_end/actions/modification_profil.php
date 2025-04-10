<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/CSS/generique.css">
    <script src="assets/js/script.js" defer></script>
    <title>Modification des informations</title>
</head>

<body>
    <h2 class="titreModification">Modifier les informations</h2>
    <div class="containerModification">
        <div class="form-section">
            <h3>Informations personnelles</h3>
            <form action="submit_form.php" method="post" enctype="multipart/form-data">
                <label>Nom :</label>
                <input type="text" name="nom" value="DUPONT" required><br>

                <label>Prénom :</label>
                <input type="text" name="prenom" value="Antoine" required><br>

                <label>Adresse :</label>
                <input type="text" name="adresse" value="17 rue Albert Lebrun" required><br>

                <label>Code postal :</label>
                <input type="text" name="code_postal" value="54000" required><br>

                <label>Ville :</label>
                <input type="text" name="ville" value="NANCY" required><br>

                <label>Email :</label>
                <input type="email" name="email" value="dupont@gmail.com" required><br>

                <h3>Photo de profil</h3>
                <label>Changer l'image de profil :</label>
                <input type="file" name="profile_image" accept="image/*"><br>
        </div>

        <div class="form-section">
            <h3>Informations sur le véhicule</h3>
            <label>Marque :</label>
            <input type="text" name="marque" value="Mercedes" required><br>

            <label>Modèle :</label>
            <input type="text" name="modele" value="Classe C63S AMG" required><br>

            <label>1ère Immatriculation :</label>
            <input type="date" name="premiere_immatriculation" value="2024-05-17" required><br>

            <label>Immatriculation :</label>
            <input type="text" name="immatriculation" value="AA-666-AA" required><br>

            <label>Motorisation :</label>
            <input type="text" name="motorisation" value="SP 98" required><br>

            <label>Puissance :</label>
            <input type="text" name="puissance" value="680 cv" required><br>
        </div>
    </div>
    <br>
    <button type="submit" class="btnModification">Enregistrer les modifications</button>
    </form>
    <button onclick="history.back()">Retour</button>
</body>

</html>