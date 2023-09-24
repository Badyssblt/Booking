<?php
    if($_GET){
        require(__DIR__ . "/../class/Reservation.php");
        require(__DIR__ . "/../class/Db.php");
        extract($_GET);
        $db = new Database("localhost", "root", "", "bookingfe");
        $resInstance = new Reservation($db);
        $reservation = $resInstance->getBookByID($id);
        $response = [
            "get" => $reservation
        ];
       echo json_encode($response);
    }
?>