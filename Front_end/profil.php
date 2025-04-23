<?php
session_start();
if (empty($_SESSION['id'])) {
    header('Location: /projet_fil_rouge/front_end/index.php');
    exit();
}
include_once 'config/db.php'; // Inclure la connexion à la base de données

// Récupérer l'ID utilisateur depuis la session
$id = $_SESSION['id'];

// Récupérer les infos du profil connecté
$sql = "SELECT * FROM utilisateurs WHERE Id_utilisateurs = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Erreur : utilisateur introuvable.";
    exit();
}

// Vérifier si l'utilisateur a un véhicule enregistré
$sql_vehicule = "SELECT * FROM vehicules WHERE Id_utilisateurs = :id";
$stmt_vehicule = $conn->prepare($sql_vehicule);
$stmt_vehicule->bindParam(':id', $id, PDO::PARAM_INT);
$stmt_vehicule->execute();
$vehicule = $stmt_vehicule->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/generique.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="assets/js/script.js" defer></script>

    <title>Mon profil</title>
</head>

<body>
    <?php include('template/header.php'); ?>
    <div class="numero-client">
        <span>N°0123456789</span>
    </div>

    <main>
        <?php include_once 'modal_inscription.php';
        include_once 'modal_connexion.php'; ?>
        <div class="titre_profil">
            <h1>Mon Profil</h1>
        </div>
        <div class="container_profil">


            <div class="card_profil">
                <img src="<?= isset($user['avatar']) && !is_null($user['avatar']) ? htmlspecialchars($user['avatar']) : 'default-avatar.jpg' ?>"
                    alt="Image de Profil">
                <h2>
                    <?= isset($user['nom_utilisateurs']) && !is_null($user['nom_utilisateurs']) ? htmlspecialchars($user['nom_utilisateurs']) : 'Nom non disponible' ?>
                    <?= isset($user['prenom_utilisateurs']) && !is_null($user['prenom_utilisateurs']) ? htmlspecialchars($user['prenom_utilisateurs']) : 'Prénom non disponible' ?>
                </h2>
                <span>Adresse :
                    <?= isset($user['adresse_utilisateurs']) && !is_null($user['adresse_utilisateurs']) ? htmlspecialchars($user['adresse_utilisateurs']) : 'Adresse non disponible' ?></span>
                <span>Code postal :
                    <?= isset($user['code_postal']) && !is_null($user['code_postal']) ? htmlspecialchars($user['code_postal']) : 'Code postal non disponible' ?></span>
                <span>Ville :
                    <?= isset($user['ville_utilisateurs']) && !is_null($user['ville_utilisateurs']) ? htmlspecialchars($user['ville_utilisateurs']) : 'Ville non disponible' ?></span>
                <span>Mail :
                    <?= isset($user['email_utilisateurs']) && !is_null($user['email_utilisateurs']) ? htmlspecialchars($user['email_utilisateurs']) : 'E-mail non disponible' ?></span>
                <a href="actions/modification_profil.php" class="btn">Modifier</a>
            </div>


            <div class="tableau_profil">
                <h3>Mon véhicule</h3>
                <div class="table-container_profil">
                    <table>
                        <tr>
                            <th>Marque</th>
                            <th>Modèle</th>
                            <th>Année</th>
                            <th>Kilométrage</th>
                        </tr>

                        <?php
                        $utilisateur_id = $_SESSION['id']; // Utilisation de l'ID de l'utilisateur connecté
                        
                        // Modification de la requête pour récupérer marque, modèle, année et kilométrage
                        $sql = "
SELECT 
    m.nom_marques AS marque,
    mo.nom_modele AS modele,
    v.annee,
    v.kilometrage
FROM vehicules v
JOIN marques m ON v.Id_marques = m.Id_marques
JOIN modeles mo ON mo.Id_modeles = v.Id_modeles
WHERE v.Id_utilisateurs = :utilisateur_id";


                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
                        $stmt->execute();
                        $vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Vérification de la présence de véhicules pour cet utilisateur
                        if ($vehicules) {
                            foreach ($vehicules as $vehicule) {
                                // Vérification et échappement des valeurs avant l'affichage
                                $marque = isset($vehicule['marque']) ? htmlspecialchars($vehicule['marque']) : 'Marque non disponible';
                                $modele = isset($vehicule['modele']) ? htmlspecialchars($vehicule['modele']) : 'Modèle non disponible';
                                $annee = isset($vehicule['annee']) && !is_null($vehicule['annee']) ? htmlspecialchars($vehicule['annee']) : 'Année non disponible';
                                $kilometrage = isset($vehicule['kilometrage']) && !is_null($vehicule['kilometrage']) ? htmlspecialchars($vehicule['kilometrage']) : 'Kilométrage non disponible';

                                // Affichage des informations du véhicule
                                echo "<tr>
                            <td>" . $marque . "</td>
                            <td>" . $modele . "</td>
                            <td>" . $annee . "</td>
                            <td>" . $kilometrage . " km</td>
                        </tr>";
                            }
                        } else {
                            // Si aucun véhicule n'est associé à l'utilisateur, afficher des champs vides
                            echo "<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>";
                        }
                        ?>
                    </table>
                    <button id="openModalVehicule">Ajouter un véhicule</button>
                </div>
            </div>




        </div>
        </div>

        <!-- La fenêtre modale -->
        <div id="modalVehicule" class="modal">
            <div class="modal-content">
                <span id="closeModalVehicule" class="close">&times;</span>
                <h3>Ajouter un véhicule</h3>
                <form action="actions/ajout_vehicule.php" method="post">
                    <label for="nom_marques">Marque :</label>
                    <select name="nom_marques" id="marqueSelect" required>
                        <option value="">Sélectionner une marque</option>
                        <?php
                        // Affichage des marques à partir de la table marques
                        $stmt = $conn->prepare("SELECT DISTINCT nom_marques FROM marques ORDER BY nom_marques");
                        $stmt->execute();
                        $marques = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($marques as $m) {
                            echo "<option value=\"" . htmlspecialchars($m['nom_marques']) . "\">" . htmlspecialchars($m['nom_marques']) . "</option>";
                        }
                        ?>
                    </select>

                    <label for="modele_vehicules">Modèle :</label>
                    <select name="modele_vehicules" id="modeleSelect" required>
                        <option value="">Sélectionnez d'abord une marque</option>
                    </select>

                    <label for="motorisation">Motorisation :</label>
                    <select name="motorisation" id="motorisationSelect" required>
                        <option value="">Sélectionnez d'abord un modèle</option>
                    </select>

                    <label for="immatriculation">Immatriculation :</label>
                    <input type="text" name="immatriculation" required>

                    <label for="annee">Année :</label>
                    <input type="number" name="annee" min="1900" max="2025" required>

                    <label for="couleur">Couleur :</label>
                    <input type="text" name="couleur" required>

                    <label for="kilometrage">Kilométrage :</label>
                    <input type="number" name="kilometrage" required>

                    <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['id'] ?>">

                    <button type="submit">Ajouter</button>
                </form>
            </div>
        </div>



        <div class="buttons_profil">
            <button><i class="ri-calendar-schedule-line"></i>Mes rendez-vous</button>
            <button><i class="ri-calendar-check-line"></i>Historiques</button>
        </div>
    </main>
    <?php include('template/footer.php'); ?>
</body>

</html>