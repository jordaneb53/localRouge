<header>
    <div class="header">
        <h1>MNS GARAGE</h1>
        <div class="search-container">
            <label for="recherche"></label>
            <input type="text" id="recherche" placeholder="Rechercher"><i class="ri-search-2-line"></i>
        </div>
        <div class="users">
            <?php
            if (isset($_SESSION['nom'])) { ?>
                <p>Connecté en tant que :
                    <?= htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']) ?>
                </p>
                <img src="<?= htmlspecialchars($_SESSION['avatar']) ?>" alt="avatar profil" width="100px">
                <a href="actions/logout.php">Déconnexion</a><br>
            <?php } else { ?>

                <div class="icons">
                    <button id="displayModal"><i class="ri-file-user-line"></i>Inscription</button>
                </div>
            </div>
            <div class="icons">
                <button id="openLoginModal"><i class="ri-login-box-line"></i>Se connecter</button>
            </div>
        <?php } ?>
    </div>
    </div>
    </div>
</header>

<i class="ri-menu-line" id="iconBurger"></i>

<div class="usersMobile">
    <?php if (isset($_SESSION['nom'])) { ?>
        <div class="user-info">
            <img src="<?= htmlspecialchars($_SESSION['avatar']) ?>" alt="avatar profil">
            <p>Connecté en tant que :<?= htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']) ?>
            </p>
        </div>
        <a href="actions/logout.php" class="logout-icon" title="Déconnexion">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    <?php } else { ?>
        <div class="icons">
            <button id="displayModal"><i class="ri-file-user-line"></i> Inscription</button>
            <button id="openLoginModal"><i class="ri-login-box-line"></i> Se connecter</button>
        </div>
    <?php } ?>
</div>
</div>
<div class="burgerMenu">
    <div class="fermerBurger">
        <i class="ri-close-line"></i>
    </div>

    <nav class="navBurger">
        <ul>


            <?php if (isset($_SESSION['id'])): ?>
                <?php if ($_SESSION['garage_solidaire'] == 1): ?>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="service_mecanique_solidaire.php">Service Mecanique</a></li>
                    <li><a href="service_carroserie_solidaire.php">Service Carroserie</a></li>
                    <li><a href="garage_solidaire2.php">Garage solidaire</a></li>
                    <li><a href="revision.php">Révision</a></li>
                    <li><a href="vehicule_occasion.php">Véhicules d'occasions</a></li>
                    <li><a href="profil.php">Mon profil</a></li>
                <?php else: ?>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="service_mecanique.php">Service mécanique</a></li>
                    <li><a href="service_carroserie.php">Service carroserie</a></li>
                    <li><a href="revision.php">Révision</a></li>
                    <li><a href="garage_solidaire.php">Garage solidaire</a></li>
                    <li><a href="vehicule_occasion.php">Véhicules d'occasions</a></li>
                    <li><a href="profil.php">Mon profil</a></li>
                <?php endif; ?>
            <?php else: ?>
                <!-- Nav visible pour les non-connectés -->
                <li><a href="index.php">Accueil</a></li>
                <li><a href="service_mecanique.php">Service mécanique</a></li>
                <li><a href="service_carroserie.php">Service carrosserie</a></li>
                <li><a href="revision.php">Révision</a></li>
                <li><a href="garage_solidaire.php">Garage solidaire</a></li>
                <li><a href="vehicule_occasion.php">Véhicules d'occasions</a></li>

            <?php endif; ?>
        </ul>
    </nav>
</div>

<hr class="line">

<nav class="nav_link">
    <ul>


        <?php if (isset($_SESSION['id'])): ?>
            <?php if ($_SESSION['garage_solidaire'] == 1): ?>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="service_mecanique_solidaire.php">Service Mecanique</a></li>
                <li><a href="service_carroserie_solidaire.php">Service Carroserie</a></li>
                <li><a href="garage_solidaire2.php">Garage solidaire</a></li>
                <li><a href="revision.php">Révision</a></li>
                <li><a href="vehicule_occasion.php">Véhicules d'occasions</a></li>
                <li><a href="profil.php">Mon profil</a></li>
            <?php else: ?>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="service_mecanique.php">Service mécanique</a></li>
                <li><a href="service_carroserie.php">Service carroserie</a></li>
                <li><a href="revision.php">Révision</a></li>
                <li><a href="garage_solidaiare.php">Garage solidaire</a></li>
                <li><a href="vehicule_occasion.php">Véhicules d'occasions</a></li>
                <li><a href="profil.php">Mon profil</a></li>
            <?php endif; ?>
        <?php else: ?>
            <!-- Nav visible pour les non-connectés -->
            <li><a href="index.php">Accueil</a></li>
            <li><a href="service_mecanique.php">Service mécanique</a></li>
            <li><a href="service_carroserie.php">Service carrosserie</a></li>
            <li><a href="revision.php">Révision</a></li>
            <li><a href="garage_solidaire.php">Garage solidaire</a></li>
            <li><a href="vehicule_occasion.php">Véhicules d'occasions</a></li>

        <?php endif; ?>
    </ul>
</nav>




<!-- <nav class="nav_link">
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="service_mecanique.php">Service mécanique</a></li>
        <li><a href="service_carroserie.php">Service carroserie</a></li>
        <li><a href="revision.php">Révision</a></li>
        <li><a href="garage_solidaiare.php">Garage solidaire</a></li>
        <li><a href="vehicule_occasion.php">Véhicules d'occasions</a></li>
        <li><a href="profil.php">Mon profil</a></li>
    </ul>
</nav> -->