<?php
if($_POST){
    extract($_POST);
    require(__DIR__ . "/../class/Db.php");
    require(__DIR__ . "/../class/User.php");
    $db = new Database("localhost", "root", "", "bookingfe");
    $userInstance = new User($db);
    $connect = $userInstance->Login($email, $password);
    if($connect){
        $response = [
            "message" => "connecté"
        ];
    }else {
        $response = [
            "message" => "non connecté"
        ];
    }
    $response = [
        "message" => "test"
    ];
    echo json_encode($response);
    
}

?>