<?php
include_once 'actions/controle_formulaire.php';
// session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/CSS/generique.css">
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/toogle.js" defer></script>

    <title>MNS GARAGE/BRAUN Jordane</title>
</head>

<body>
    <?php include_once 'template/header.php'; ?>
    <main>
        <?php include_once 'modal_inscription.php';
        include_once 'modal_connexion.php'; ?>

        <section>
            <div class="image">
                <img src="assets/image/garage.jpg" alt="image de la page d'acceuil">
            </div>
        </section>
        <section>
            <article class="description_article">
                <h2>Horraires d'ouverture de votre garage</h2>

                <table class="horaires">
                    <tr>
                        <th>Jours</th>
                        <th>Heures</th>
                    </tr>

                    <tr>
                        <td>Lundi</td>
                        <td>08h00/18h00</td>
                    </tr>
                    <tr>
                        <td>Mardi</td>
                        <td>08h00/18h00</td>
                    </tr>
                    <tr>
                        <td>Mercredi</td>
                        <td>08h00/18h00</td>
                    </tr>
                    <tr>
                        <td>Jeudi</td>
                        <td>08h00/18h00</td>
                    </tr>
                    <tr>
                        <td>Vendredi</td>
                        <td>08h00/18h00</td>
                    </tr>

                </table>

                <div class="description">
                    <span>Chez MNS GARAGE, nous sommes à votre service du lundi au vendredi, de 8h à 18h, sans
                        interruption. Notre équipe est dédiée à vous offrir un service de qualité tout au long de la
                        journée. Que vous ayez besoin d'une réparation, d'un entretien ou simplement d'un conseil, nous
                        sommes là pour vous accompagner.
                    </span>
                </div>

            </article>
        </section>
        <section>
            <article>
                <div class="image">
                    <img src="assets/image/produits.jpg" height="500" alt="image des différents produits proposés">
                </div>
            </article>
        </section>

        <section class="recherche-produits">

            <div>
                <h2>Rechercher des produits par référence</h2>

                <div class="container_placement">
                    <div class="produits">
                        <span>FILTRES</span>
                        <label for="filtres"></label>
                        <select name="filtres" id="produits"></select>
                        <span>PNEUS</span>
                        <label for="pneus"></label>
                        <select name="pneus" id="produits"></select>
                        <span>AMORTISSEUR</span>
                        <label for="amortisseur"></label>
                        <select name="amortisseur" id="produits"></select>
                    </div>
                    <div class="produits2">
                        <span>FREINS</span>
                        <label for="freins"></label>
                        <select name="freins" value="teste" id="produits">
                            <option selected disabled>Sélection</option>
                            <option>Option 1</option>
                        </select>
                        <span>VIDANGE</span>
                        <label for="vidange"></label>
                        <select name="vidange" id="produits"></select>
                        <span>ACCESSOIRES</span>
                        <label for="accessoires"></label>
                        <select name="accessoires" id="produits"></select>
                    </div>
                </div>
            </div>

            <div class="immatriculation">
                <h2>Rechercher des produits avec votre plaque d'immatriculation</h2>
                <div class="placementrecherche">
                    <span>Saisir votre plaque d'immatriculation</span><br>
                    <label for="immatriculation"></label>
                    <input type="text" id="immatriculation" placeholder="AA-123-AA"><br>
                    <button id="Valider">Valider</button>
                </div>

            </div>
        </section>
    </main>
    <?php include_once 'template/footer.php'; ?>
</body>

</html>