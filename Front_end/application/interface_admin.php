<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="interface.css">

    <title>Administration MNS GARAGE</title>
</head>

<body>
    <header>
        <h1>Admin MNS GARAGE</h1>
        <ul>
            <li><a href="logout.php">Déconnexion</a></li>
            <li>
                <a href="#">Profils ▾</a>
                <ul class="sousMenu">
                    <li><a href="interface_admin.php">Admin</a></li>
                    <li><a href="interface_employe.php">Employés</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <main>
        <div class="container">
            <ul class="nav-bar">
                <li>Planning <i class="ri-calendar-schedule-line"></i></li>
                <li>Pièces<i class="ri-tools-line"></i></li>
                <li>Clients<i class="ri-folder-user-line"></i></li>
                <li>V.O<i class="ri-roadster-line"></i></li>
                <li>Employés<i class="ri-user-3-line"></i></li>
                <li>Gestion<i class="ri-line-chart-line"></i></li>
            </ul>
        </div>
    </main>
</body>

</html>