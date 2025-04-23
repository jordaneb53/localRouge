<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE Id_utilisateurs = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "Client introuvable.";
        exit;
    }
}

?>

<form method="POST">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($user['nom_utilisateurs'] ?? '') ?>" required>
    <input type="hidden" name="falseId" value="<?= htmlspecialchars($user['Id_utilisateurs'] ?? '') ?>" required>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom_utilisateurs'] ?? '') ?>" required>

    <label for="adresse">Adresse :</label>
    <input type="text" name="adresse" value="<?= htmlspecialchars($user['adresse_utilisateurs'] ?? '') ?>" required>

    <label for="ville">Ville :</label>
    <input type="text" name="ville" value="<?= htmlspecialchars($user['ville_utilisateurs'] ?? '') ?>" required>

    <label for="code_postal">Code Postal :</label>
    <input type="text" name="code_postal" value="<?= htmlspecialchars($user['code_postal'] ?? '') ?>" required>

    <label for="telephone">Téléphone :</label>
    <input type="text" name="telephone" value="<?= htmlspecialchars($user['telephone_utilisateurs'] ?? '') ?>" required>

    <label for="email">Email :</label>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email_utilisateurs'] ?? '') ?>" required>

    <label for="garage_solidaire">Garage Solidaire :</label>
    <span>Si 1, le client fait partie du garage solidaire</span><br>
    <span>Si 0, le client est un client fidèle</span>
    <input type="text" name="garage_solidaire" value="<?= htmlspecialchars($user['garage_solidaire'] ?? '') ?>">

    <button type="submit" name="teste">Mettre à jour</button>
</form>