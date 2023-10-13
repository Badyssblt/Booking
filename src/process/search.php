<?php

if(isset($_GET)){
    require(__DIR__ . "/../class/Db.php");
    require(__DIR__ . "/../class/Reservation.php");
    $db = new Database("localhost", "root", "", "bookingfe");
    $reservations = new Reservation($db);
    extract($_GET);
    $stmt = $reservations->getBookByFilter($name, $animal, $wifi, $chamber);
    $response = $stmt;
    echo json_encode($response);
}

?>