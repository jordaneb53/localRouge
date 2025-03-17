<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/generique.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="script.js" defer></script>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>


    <title>Révision /Garage MNS</title>
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
        <img src="image/revision1.png" alt="image de fond pour la révision" class="revision">

        <div class="fond_revision">
            <h2>Contrôles Effectués lors de votre révision automobile</h2>
            <span>Une révision automobile est essentielle pour maintenir votre véhicule en bon état de fonctionnement et
                assurer votre sécurité sur la route. Voici les principaux contrôles effectués lors d'une révision
                :</span>
        </div>

        <div class="ensemble_revision">
            <table border="1">
                <thead>
                    <tr>
                        <th>Contrôles</th>
                        <th>Détails</th>
                        <th>Citadine
                            <br>
                            <span>Tarif</span>
                            <br>
                            <span class="prix">70€</span>
                        </th>
                        <th>SUV
                            <br>
                            <span>Tarif</span>
                            <br>
                            <span class="prix">95€</span>
                        </th>
                        <th>4X4
                            <br>
                            <span>Tarif</span>
                            <br>
                            <span class="prix">100€</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>1. Contrôle des Niveaux de Fluides</strong></td>
                        <td>
                            <ul>
                                <li>Huile moteur : Vérification et ajustement du niveau d'huile pour garantir une
                                    lubrification optimale du moteur.</li>
                                <li>Liquide de refroidissement : Contrôle du niveau et de l'état du liquide pour éviter
                                    la surchauffe du moteur.</li>
                                <li>Liquide de frein : Vérification du niveau pour assurer un freinage efficace.</li>
                                <li>Liquide de direction assistée : Contrôle du niveau pour un fonctionnement fluide de
                                    la direction.</li>
                                <li>Liquide lave-glace : Vérification et remplissage pour une visibilité optimale.</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>2. Inspection des Freins</strong></td>
                        <td>
                            <ul>
                                <li>Vérification de l'usure des plaquettes et des disques de frein.</li>
                                <li>Contrôle de l'état des tambours et des mâchoires de frein.</li>
                                <li>Test du système de freinage pour détecter toute anomalie.</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>3. Contrôle des Pneus</strong></td>
                        <td>
                            <ul>
                                <li>Vérification de la pression des pneus et ajustement si nécessaire.</li>
                                <li>Inspection de l'usure des pneus pour s'assurer qu'ils sont en bon état.</li>
                                <li>Contrôle de l'alignement des roues.</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>4. Vérification des Suspensions et des Amortisseurs</strong></td>
                        <td>
                            <ul>
                                <li>Inspection de l'état des amortisseurs et des ressorts de suspension.</li>
                                <li>Vérification des articulations et des rotules pour détecter toute usure.</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>5. Contrôle des Filtres</strong></td>
                        <td>
                            <ul>
                                <li>Remplacement du filtre à air pour assurer une bonne combustion.</li>
                                <li>Remplacement du filtre à huile pour maintenir la propreté de l'huile moteur.</li>
                                <li>Remplacement du filtre de carburant pour garantir une alimentation propre en
                                    carburant.</li>
                                <li>Remplacement du filtre d'habitacle pour une meilleure qualité de l'air intérieur.
                                </li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>6. Inspection des Éclairages et des Signaux</strong></td>
                        <td>
                            <ul>
                                <li>Vérification du bon fonctionnement des phares, feux arrière, clignotants et feux de
                                    freinage.</li>
                                <li>Contrôle de l'alignement des phares.</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>7. Vérification de la Batterie</strong></td>
                        <td>
                            <ul>
                                <li>Test de la charge et de l'état général de la batterie.</li>
                                <li>Inspection des bornes pour détecter toute corrosion.</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>8. Contrôle des Courroies</strong></td>
                        <td>
                            <ul>
                                <li>Vérification de l'état de la courroie de distribution et des courroies accessoires.
                                </li>
                                <li>Remplacement si nécessaire pour éviter des pannes graves.</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>9. Inspection des Échappements</strong></td>
                        <td>
                            <ul>
                                <li>Vérification de l'état du système d'échappement pour détecter toute fuite ou
                                    corrosion.</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>10. Test des Systèmes Électroniques</strong></td>
                        <td>
                            <ul>
                                <li>Vérification des systèmes de diagnostic embarqué pour détecter les codes d'erreur.
                                </li>
                                <li>Contrôle des systèmes de sécurité et de confort (ABS, ESP, airbags, etc.).</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                    <tr>
                        <td><strong>11. Contrôle de la Carrosserie</strong></td>
                        <td>
                            <ul>
                                <li>Inspection visuelle de la carrosserie pour détecter les éventuels dommages ou signes
                                    de corrosion.</li>
                            </ul>
                        </td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                        <td><i class="fa-solid fa-circle-check"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="button_revision">
            <a href="planning.php" target="_blank">
                <button>Prendre un rendez-vous</button>
            </a>
        </div>
    </main>

    <?php include_once 'footer.php'; ?>
</body>

</html>