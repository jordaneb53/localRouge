<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/generique.css">
    <script src="script.js" defer></script>

    <title>MNS GARAGE/BRAUN Jordane</title>
</head>

<body>
    <?php include_once 'header.php'; ?>
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
        <div id="loginModal" class="modal_connexion">
            <div class="modal-content">
                <button id="closeLoginModal" class="close-btn">
                    <i class="ri-close-large-line"></i>
                </button>
                <h2>Connexion</h2>

                <form id="loginForm">
                    <div class="form-group">
                        <label for="loginEmail">Email:</label>
                        <input type="email" id="loginEmail" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="loginPassword">Mot de passe:</label>
                        <div class="password-container">
                            <input type="password" id="loginPassword" name="password" required>
                            <span class="toggle-password" onclick="togglePassword()">👁</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="btnLogin">Se connecter</button>
                    </div>
                </form>

                <p id="motPassOublier"><a href="reset-password.html">Mot de passe oublié ?</a></p>
            </div>
        </div>

        <section>
            <div class="image">
                <img src="image/garage.jpg" alt="image de la page d'acceuil">
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
                    <img src="image/produits.jpg" height="500" alt="image des différents produits proposés">
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
    <?php include_once 'footer.php'; ?>
</body>

</html>