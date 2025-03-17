<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/generique.css">
    <title>Inscription</title>
</head>

<body>
    <div class="form-wrapper">
        <h1>MNS GARAGE</h1>
        <div class="container">
            <div class="entete">
                <h2>Formulaire d'Inscription</h2>
            </div>
            <form action="#" method="post">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
    
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
    
                <label for="email">Adresse e-mail :</label>
                <input type="email" id="email" name="email" required>
    
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required>
    
                <label for="confirmation_mot_de_passe">Confirmer le mot de passe :</label>
                <input type="password" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe" required>
    
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required>
    
                <label for="ville">Ville:</label>
                <input type="text" id="ville" name="ville" required>
    
                <label for="codePostal">Code postale :</label>
                <input type="text" id="codePostal" name="codePostal" required>
    
                <div class="checkbox-container">
                    <input type="checkbox" id="adherer_garage" name="adherer_garage">
                    <label for="adherer_garage">Je souhaite faire parti du garage solidaire et donc d’adhérée à l’association</label>
    
                    <input type="checkbox" id="accepter_conditions" name="accepter_conditions" required>
                    <label for="accepter_conditions">J'accepte les conditions d'utilisation et la politique de confidencialité</label>
                </div>
    
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
    <div class="button-container">
        <button onclick="history.back()">Retourner à la Page Précédente</button>
    </div>
    
</body>

</html>