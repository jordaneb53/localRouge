<?php

require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM utilisateurs WHERE Id_utilisateurs = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo "Client supprimé avec succès.";
}