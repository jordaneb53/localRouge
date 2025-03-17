<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/generique.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="script.js" defer></script>


    <title>Véhicules d'occasions /Garage MNS</title>
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <div id="modal">
            <div class="form-container">
                <button id="closeModal"><i class="ri-close-large-line"></i></button>
                <h2>Formulaire d'Inscription</h2>
                <form method="post" id="form" novalidate>
                    <div class="form-group ">
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" name="prenom">
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="required">*</span>:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse<span class="required">*</span>:</label>
                        <input type="text" id="adresse" name="adresse">
                    </div>
                    <div class="form-group">
                        <label for="codePostale ">Code postale<span class="required">*</span>:</label>
                        <input type="text" id="codePostale" name="codePostale">
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville<span class="required">*</span>:</label>
                        <input type="text" id="ville" name="ville">
                    </div>
                    <div class="form-group">
                        <label for="mot_de_passe">Mot de passe<span class="required">*</span>:</label>
                        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

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
                        <label for="mot_de_passe">Confirmer le mot de passe<span class="required">*</span>:</label>
                        <input type="password" id="confirme_mot_de_passe" name="mot_de_passe" required>
                    </div>
                    <div>
                        <input type="checkbox" id="conditionGarageSolidaire" name="conditionGarageSolidaire">
                        <label for="conditionGarageSolidaire">J'accepte les conditions d'ahdésion au garage
                            solidaire</label>
                    </div>
                    <div>
                        <input type="checkbox" id="accepter_conditions" name="accepter_conditions">
                        <label for="accepter_conditions">J'accepte les conditions générales <span
                                class="required">*</span></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btn" value="S'inscrire">
                    </div>
                </form>
            </div>

            <a href="#" id="backModal">Retour</a>

        </div>
        <div class="titreOccasion">
            <h1>Nos véhicules d'occasions</h1>
        </div>
        <div class="filtres">
            <div class="slider-container">
                <label for="kilometrage">Kilométrage: <span id="km-value">50000</span> km</label>
                <input type="range" id="kilometrage" class="slider" min="0" max="200000" step="1000" value="50000"
                    oninput="updateValue('km-value', this.value)">
            </div>

            <div class="slider-container">
                <label for="prix">Prix: <span id="prix-value">15000</span> €</label>
                <input type="range" id="prix" class="slider" min="500" max="200000" step="500" value="15000"
                    oninput="updateValue('prix-value', this.value)">
            </div>
        </div>

        <section class="cards-container">
            <div class="card">
                <img src="image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="image/MANHART-Golf-GTI-290-Website-1.png" alt="GTI MANHART">
                <h3>Golf GTI-MANHART</h3>
                <span>Kilométrage: 23000 km</span>
                <span>Prix: 59000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="image/range-rover-evoque-assurance.jpg" alt="Range rover sport svr5.0">
                <h3>Range Rover Sport</h3>
                <span>Kilométrage: 42000 km</span>
                <span>Prix: 97000€</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="image/S0-renault-arkana-2023-petite-mise-a-jour-et-finition-esprit-alpine-203316.png"
                    alt="RS6 ABT">
                <h3>Renault ARKANA E-TECH</h3>
                <span>Kilométrage: 64000 km</span>
                <span>Prix: 19000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="image/exter-peugeot-308-0905js-2131-redimensionner.png" alt="RS6 ABT">
                <h3>Peugeot 308</h3>
                <span>Kilométrage: 86000km</span>
                <span>Prix: 14500 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="card">
                <img src="image/abt-audi-rs6-r.png" alt="RS6 ABT">
                <h3>Audi RS6-ABT</h3>
                <span>Kilométrage: 15000 km</span>
                <span>Prix: 123000 €</span>
                <button>Voir le détail</button>
            </div>
            <div class="pagination">
                <button class="page-btn" onclick="changePage(-1)" id="prev-btn">Précédent</button>
                <div id="page-buttons"></div>
                <button class="page-btn" onclick="changePage(1)" id="next-btn">Suivant</button>
            </div>

    </main>
    <?php include("footer.php"); ?>
</body>

</html>