<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/generique.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="script.js" defer></script>


    <title>Garage Solidaire /Garage MNS</title>
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
        <img class="garageSolidaire" src="image/pont_rge_bleu.jpg" alt="garage avec pont automobile bleu et rouge ">
        <div class="solidaire">
            <h1> MNS GARAGE : Votre Garage Solidaire</h1>

            <span>Comment ça marche ?
                Adhésion à l'Association : Pour bénéficier de nos services, il vous suffit de devenir membre de notre
                association solidaire. L'adhésion est ouverte à tous et permet d'accéder à un espace équipé d'outils
                professionnels.
                Espace et Outilage Professionnel : Nous mettons à votre disposition un espace de travail sécurisé et
                équipé d'outils professionnels de qualité. Que vous soyez novice ou expérimenté, vous trouverez tout ce
                dont vous avez besoin pour entretenir et réparer votre véhicule.
                Encadrement par un Responsable d'Atelier : Notre responsable d'atelier est là pour vous guider et vous
                conseiller à chaque étape de votre projet. Grâce à son expertise, vous pourrez effectuer vos réparations
                en toute sécurité et avec confiance.
                Autonomie et Apprentissage : En devenant membre, vous aurez l'opportunité d'apprendre et de maîtriser
                les techniques de réparation automobile. C'est une excellente occasion de développer de nouvelles
                compétences tout en prenant soin de votre véhicule.</span>
            <img class="garageSolidaire" src="image/garage_solidaire.jpg" alt="garage solidaire">
            <span>Pourquoi nous rejoindre ?
                Économies : Réalisez vos réparations vous-même et économisez sur les coûts de main-d'œuvre.
                Autonomie : Devenez autonome dans l'entretien de votre véhicule.
                Communauté : Rejoignez une communauté de passionnés et d'enthousiastes de l'automobile.
                Solidarité : Participez à un projet solidaire qui valorise l'entraide et le partage des connaissances.
                Rejoignez-nous dès aujourd'hui et découvrez une nouvelle façon de prendre soin de votre véhicule ! Pour
                plus d'informations sur l'adhésion et les services proposés, n'hésitez pas à nous contacter.</span>
        </div>
        <button class="btn_solidaire">S'inscrire maintenant</button>
    </main>
    <?php include_once 'footer.php'; ?>
</body>

</html>