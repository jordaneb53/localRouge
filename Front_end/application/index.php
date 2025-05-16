<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="interface.css">
    <script src="script.app.js" defer></script>
    <title>Connexion MNS GARAGE</title>
</head>

<body>
    <main>
        <div class="connexionApp">
            <h1>MNS GARAGE APPLICATION</h1>
            <form class="login-form" action="login.php" method="POST" onsubmit="return validateForm()">
                <h2>Connexion</h2>

                <label for="username">Nom:</label>
                <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>

                <label for="loginPassword">Mot de passe:</label>
                <div class="password-container">
                    <input type="password" id="loginPassword" name="password" placeholder="Mot de passe" required>
                    <span class="toggle-password1" onclick="togglePasswordVisibility()">👁</span>
                </div>

                <button type="submit" id="loginButton">Se connecter</button>

                <p id="motPassOublier"><a href="#">Mot de passe oublié ?</a></p>
            </form>
        </div>

    </main>
    </div>