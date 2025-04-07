<?php
session_start();

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
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>


    <title>Révision /Garage MNS</title>
</head>

<body>
    <?php include_once 'template/header.php'; ?>
    <main>
        <?php include_once 'modal_inscription.php';
        include_once 'modal_connexion.php'; ?>
        <img src="assets/image/revision1.png" alt="image de fond pour la révision" class="revision">

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

    <?php include_once 'template/footer.php'; ?>
</body>

</html>