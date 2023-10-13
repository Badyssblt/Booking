<?php

require(__DIR__ . "/../class/Reservation.php");
require(__DIR__ . "/../class/Db.php");
$db = new Database("localhost", "root", "", "bookingfe");
extract($_POST);
$sql = "INSERT INTO book VALUES(0, :userID, :reservationID, :date_debut, :date_fin, 0)";
$params = array("userID" => $userID, "reservationID" => $reservationID, "date_debut" => $date_debut, "date_fin" => $date_fin);
$db->create($sql, $params);
$response = [
    "message" => "Réservation enregistré",
    "action" => "success"
];
echo json_encode($response)
?>
