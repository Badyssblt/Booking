<?php
if($_POST){
    extract($_POST);
    require(__DIR__ . "/../class/Db.php");
    require(__DIR__ . "/../class/User.php");
    $db = new Database("localhost", "root", "", "bookingfe");
    $userInstance = new User($db);
    $connect = $userInstance->Login($email, $password);
    echo json_encode($connect);
    
}

?>