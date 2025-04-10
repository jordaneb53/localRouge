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


    <title>Garage Solidaire /Garage MNS</title>
</head>

<body>
    <?php include_once 'template/header.php'; ?>
    <main>
        <?php
        include_once 'modal_inscription.php';
        include_once 'modal_connexion.php';
        ?>

        <img class="garageSolidaire" src="assets/image/pont_rge_bleu.jpg"
            alt="garage avec pont automobile bleu et rouge ">
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
            <img class="garageSolidaire" src="assets/image/garage_solidaire.jpg" alt="garage solidaire">
            <span>Pourquoi nous rejoindre ?
                Économies : Réalisez vos réparations vous-même et économisez sur les coûts de main-d'œuvre.
                Autonomie : Devenez autonome dans l'entretien de votre véhicule.
                Communauté : Rejoignez une communauté de passionnés et d'enthousiastes de l'automobile.
                Solidarité : Participez à un projet solidaire qui valorise l'entraide et le partage des connaissances.
                Rejoignez-nous dès aujourd'hui et découvrez une nouvelle façon de prendre soin de votre véhicule ! Pour
                plus d'informations sur l'adhésion et les services proposés, n'hésitez pas à nous contacter.</span>
        </div>
    </main>
    <?php include_once 'template/footer.php'; ?>
</body>

</html>