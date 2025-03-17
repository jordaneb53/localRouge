<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/generique.css">
    <script src="script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <title>Service mécanique /Garage MNS</title>
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
        <section class="cards-container">
            <div class="card">
                <h2>PNEUS</h2>
                <img src="image/pneu2.jpg" alt="changement d'un pneu">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>FREINS</h2>
                <img src="image/freins.jpg" alt="changement d'un freins">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>AMORTISSEURS</h2>
                <img src="image/amortisseurs.jpg" alt="changement d'amortisseurs">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>VIDANGE</h2>
                <img src="image/vidange.jpg" alt="vidange">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>FILTRES</h2>
                <img src="image/filtres.jpg" alt="changement d'un filtre">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>RÉVISION</h2>
                <img src="image/revision.jpg" alt="révision">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>BATTERIRE</h2>
                <img src="image/batterie.jpg" alt="changement d'une batterie">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
            </div>
            <div class="card">
                <h2>ÉCLAIRAGE</h2>
                <img src="image/eclairage.jpg" alt="éclairage">
                <a href="planning.php" target="_blank">
                    <button>Prendre un rendez-vous</button>
                </a>
            </div>
        </section>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>