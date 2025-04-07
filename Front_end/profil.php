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
$sql_vehicule = "SELECT * FROM vehicules WHERE Id_vehicule = :id";
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
                <img src="<?= htmlspecialchars($user['avatar']) ?>" alt="Image de Profil">
                <h2><?= htmlspecialchars($user['nom_utilisateurs']) . ' ' . htmlspecialchars($user['prenom_utilisateurs']) ?>
                </h2>
                <span>Adresse : <?= htmlspecialchars($user['adresse_utilisateurs']) ?></span>
                <span>Code postale : <?= htmlspecialchars($user['code_postal']) ?></span>
                <span>Ville : <?= htmlspecialchars($user['ville_utilisateurs']) ?></span>
                <span>Mail : <?= htmlspecialchars($user['email_utilisateurs']) ?></span>
                <a href="modification_profil.php" class="btn">Modifier</a>
            </div>
            <div class="tableau_profil">
                <h3>Mon véhicule</h3>
                <div class="table-container_profil">
                    <table>
                        <tr>
                            <th>Immatriculation</th>
                            <th>Année</th>
                            <th>Couleur</th>
                            <th>Kilométrage</th>
                        </tr>

                        <?php
                        $utilisateur_id = $_SESSION['id']; // Utilisation de l'ID de l'utilisateur connecté
                        
                        // Correction de la requête pour utiliser 'Id_vehicule' au lieu de 'id'
                        $sql = "SELECT v.* 
                    FROM vehicules v
                    JOIN utilisateurs_vehicules uv ON v.Id_vehicule = uv.Id_vehicule
                    WHERE uv.Id_utilisateurs = :utilisateur_id"; // Correction du nom de la colonne dans la clause JOIN
                        
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
                        $stmt->execute();
                        $vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC); // Assurez-vous de récupérer les données sous forme de tableau associatif
                        
                        // Affichage des véhicules
                        if ($vehicules) {
                            foreach ($vehicules as $vehicule) {
                                echo "<tr>
                            <td>" . htmlspecialchars($vehicule['immatriculation']) . "</td>
                            <td>" . htmlspecialchars($vehicule['annee']) . "</td>
                            <td>" . htmlspecialchars($vehicule['couleur']) . "</td>
                            <td>" . htmlspecialchars($vehicule['kilometrage']) . " km</td>
                        </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Aucun véhicule enregistré.</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>



        </div>
        </div>
        <div class="ajout_vehicule">
            <h3>Ajouter un véhicule</h3>
            <form action="actions/ajout_vehicule.php" method="post">
                <label for="immatriculation">Immatriculation :</label>
                <input type="text" name="immatriculation" required>

                <label for="annee">Année :</label>
                <input type="number" name="annee" min="1900" max="2025" required>

                <label for="couleur">Couleur :</label>
                <input type="text" name="couleur" required>

                <label for="kilometrage">Kilométrage :</label>
                <input type="number" name="kilometrage" required>


                <button type="submit">Ajouter</button>
            </form>
        </div>

        <div class="buttons_profil">
            <button><i class="ri-calendar-schedule-line"></i>Mes rendez-vous</button>
            <button><i class="ri-calendar-check-line"></i>Historiques</button>
        </div>
    </main>
    <?php include('template/footer.php'); ?>
</body>

</html>