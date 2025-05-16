<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (empty($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}

include_once '../config/db.php';

$id = $_SESSION['id'];

// Récupérer les infos utilisateur
$sql = "SELECT * FROM utilisateurs WHERE Id_utilisateurs = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si l'utilisateur existe dans la base de données
if (!$user) {
    die("Utilisateur introuvable !");
}

// Récupérer les infos véhicule
$sql = "SELECT v.*, m.nom_marques, mo.nom_modele
        FROM vehicules v
        JOIN marques m ON v.Id_marques = m.Id_marques
        JOIN modeles mo ON v.Id_modeles = mo.Id_modeles
        WHERE v.Id_utilisateurs = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$vehicule = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si le véhicule existe pour l'utilisateur
if (!$vehicule) {
    die("Véhicule introuvable !");
}

// Récupérer toutes les marques
$sql = "SELECT Id_marques, nom_marques FROM marques ORDER BY nom_marques";
$stmt = $conn->prepare($sql);
$stmt->execute();
$marques = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer tous les modèles
$sql = "SELECT Id_modeles, nom_modele FROM modeles ORDER BY nom_modele";
$stmt = $conn->prepare($sql);
$stmt->execute();
$modeles = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/CSS/generique.css">
    <script src="../assets/js/script.js" defer></script>
    <title>Modification des informations</title>
</head>

<body>
    <h2 class="titreModification">Modifier les informations</h2>
    <div class="containerModification">
        <div class="form-section">
            <h3>Informations personnelles</h3>
            <form action="traitement_modification.php" method="post" enctype="multipart/form-data">
                <label>Nom :</label>
                <input type="text" name="nom" value="<?= htmlspecialchars($user['nom_utilisateurs']) ?>" required><br>

                <label>Prénom :</label>
                <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom_utilisateurs']) ?>"
                    required><br>

                <label>Adresse :</label>
                <input type="text" name="adresse" value="<?= htmlspecialchars($user['adresse_utilisateurs']) ?>"
                    required><br>

                <label>Code postal :</label>
                <input type="text" name="code_postal" value="<?= htmlspecialchars($user['code_postal']) ?>"
                    required><br>

                <label>Ville :</label>
                <input type="text" name="ville" value="<?= htmlspecialchars($user['ville_utilisateurs']) ?>"
                    required><br>

                <label>Email :</label>
                <input type="email" name="email" value="<?= htmlspecialchars($user['email_utilisateurs']) ?>"
                    required><br>

                <div class="form-group">
                    <label for="mot_de_passe_profil">Ancien mot de passe :</label>
                    <input type="password" id="mot_de_passe_profil" name="mot_de_passe_profil">

                    <div id="passwordModal" class="modal">
                        <div class="modal-content">
                            <span id="closeModal1" class="close-btn">&times;</span>
                            <h2>Critères du mot de passe</h2>
                            <ul>
                                <li id="length" style="color:red;">❌ Au moins 8 caractères</li>
                                <li id="uppercase" style="color:red;">❌ Une lettre majuscule</li>
                                <li id="lowercase" style="color:red;">❌ Une lettre minuscule</li>
                                <li id="number" style="color:red;">❌ Un chiffre</li>
                                <li id="special" style="color:red;">❌ Un caractère spécial (#?!@$%^&*-)</li>
                            </ul>
                        </div>
                    </div>

                    <span id="passwordHelp" class="question-mark">?</span>
                </div>

                <div class="form-group">
                    <label for="nouveau_mot_de_passe_profil">Nouveau mot de passe :</label>
                    <input type="password" id="nouveau_mot_de_passe_profil" name="nouveau_mot_de_passe_profil">
                </div>

                <div class="form-group">
                    <label for="Confirme_mdp_profil">Confirmer le nouveau mot de passe :</label>
                    <input type="password" id="Confirme_mdp_profil" name="Confirme_mdp_profil">
                </div>

                <div class="checkboxSolidaire">
                    <input type="checkbox" name="garage_solidaire" id="garage_solidaire" <?= $user['garage_solidaire'] ? 'checked' : '' ?>>
                    <label for="garage_solidaire">J'accepte les conditions d'adhésion au garage solidaire</label>
                </div>

                <h3>Photo de profil</h3>
                <label>Changer l'image de profil :</label>
                <input type="file" name="profile_image" accept="image/*"><br>
        </div>

        <div class="form-section">
            <h3>Informations sur le véhicule</h3>
            <label>Marque :</label>
            <select name="Id_marques" required>
                <?php foreach ($marques as $marque): ?>
                    <option value="<?= $marque['Id_marques'] ?>" <?= ($marque['Id_marques'] == $vehicule['Id_marques']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($marque['nom_marques']) ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Modèle :</label>
            <select name="Id_modeles" required>
                <?php foreach ($modeles as $modele): ?>
                    <option value="<?= $modele['Id_modeles'] ?>" <?= ($modele['Id_modeles'] == $vehicule['Id_modeles']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($modele['nom_modele']) ?>
                    </option>
                <?php endforeach; ?>
            </select><br>


            <label>Immatriculation :</label>
            <input type="text" name="immatriculation" value="<?= htmlspecialchars($vehicule['immatriculation']) ?>"
                required><br>

            <label for="annee">Année :</label>
            <input type="number" name="annee" id="annee" value="<?= htmlspecialchars($vehicule['annee']) ?>"
                required><br>

            <label for="couleur">Couleur :</label>
            <input type="text" name="couleur" value="<?= htmlspecialchars($vehicule['couleur']) ?>" required><br>

            <label>Kilométrage :</label>
            <input type="number" name="kilometrage" value="<?= htmlspecialchars($vehicule['kilometrage']) ?>"
                required><br>

        </div>

        <button type="submit" class="btnModification">Enregistrer les modifications</button>
        </form>
        <button onclick="history.back()">Retour</button>
</body>

</html>