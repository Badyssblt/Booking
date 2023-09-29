<?php
    require(__DIR__ . "/../class/Reservation.php");
    require(__DIR__ . "/../class/Db.php");
    if(isset($_POST["date_debut"])){
        extract($_POST);
        $db = new Database("localhost", "root", "", "bookingfe");
        $resInstance = new Reservation($db);
        if($date_debut < $date_fin){
            $reservations = $resInstance->Book($userID, $reservationID, $date_debut, $date_fin);
            $response = 
                [
                    "message" => "Réservation enregistrée"
                ];
        }else {
            $response = 
            [
                "message" => "Veuillez entrer des dates valides"
            ];
        }
        
        echo json_encode($response);
    }

?>