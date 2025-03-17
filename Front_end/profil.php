<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/generique.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="script.js" defer></script>

    <title>Mon profil</title>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="numero-client">
        <span>N°0123456789</span>
    </div>

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

            <div id="loginModal" class="modal_connexion">
                <div class="modal-content">
                    <span id="closeLoginModal" class="close-btn">&times;</span>
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
                            <button type="submit">Se connecter</button>
                        </div>
                    </form>

                    <p><a href="reset-password.html">Mot de passe oublié ?</a></p>
                </div>
            </div>
            <p><a href="reset-password.html">Mot de passe oublié ?</a></p>
        </div>
        </div>
        <div class="titre_profil">
            <h1>Mon Profil</h1>
        </div>
        <div class="container_profil">


            <div class="card_profil">
                <img src="image/25251050-photo-de-profil-d-affai.jpg" alt="Image de Profil">
                <h2>DUPONT Antoine</h2>
                <span>Date de création : 02/02/2002</span>
                <span>Référence client : N°0123456789</span>
                <span>Date de naissance : 07/11/1991</span>
                <span>Adresse : 17 rue Albert Lebrun</span>
                <span>Code postale : 54000</span>
                <span>Ville : NANCY</span>
                <span>Téléphone : 06.24.33.55.69</span>
                <span>Mail : dupont@gmail.com</span>
                <a href="#" class="btn">Modifier</a>
            </div>
            <div class="tableau_profil">
                <h3>Mes informations </h3>
                <div class="table-container_profil">
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Information</th>
                        </tr>
                        <tr>
                            <td>Nom</td>
                            <td>Dupont</td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td>Antoine</td>
                        </tr>
                        <tr>
                            <td>Réf. Client</td>
                            <td>N°0123456789</td>
                        </tr>
                        <tr>
                            <td>Adresse</td>
                            <td>17 rue Albert Lebrun</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="buttons_profil">
            <button><i class="ri-calendar-schedule-line"></i>Mes rendez-vous</button>
            <button><i class="ri-calendar-check-line"></i>Historiques</button>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>