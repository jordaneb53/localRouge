<?php
require $_SERVER["DOCUMENT_ROOT"] . '/config/db.php';
header('Content-Type: application/json');

$sql = "SELECT *
        FROM reservation r
        JOIN reservation_operations ro ON r.Id_reservation = ro.Id_reservation
        JOIN operations o ON ro.Id_operations = o.Id_operations
        JOIN vehicules v ON r.Id_vehicule = v.Id_vehicule
        JOIN modeles m ON v.Id_modeles = m.Id_modeles
        JOIN marques ma ON m.Id_marques = ma.Id_marques
        JOIN utilisateurs u ON v.Id_utilisateurs = u.Id_utilisateurs";


$stmt = $conn->prepare($sql);
$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Format pour FullCalendar
$info_reservations = [];
foreach ($reservations as $res) {
    $info_reservations[] = [
        'id_reservation' => $res['Id_reservation'],
        'type_reparations' => $res['nom_operations'],
        'date_debut' => $res['date_debut'],
        'heure_debut' => $res['heure_debut'],
        'duree' => $res['duree'],
        'nom_utilisateurs' => $res['nom_utilisateurs'],
        'prenom_utilisateurs' => $res['prenom_utilisateurs'],
        'telephone_utilisateurs' => $res['telephone_utilisateurs'],
        'nom_marques' => $res['nom_marques'],
        'nom_modele' => $res['nom_modele'],
        'immatriculation' => $res['immatriculation'],
        'annee' => $res['annee'],

    ];
}
echo json_encode($info_reservations);
exit();