<?php

if($_POST){
    require(__DIR__ . "/../class/User.php");
    require(__DIR__ . "/../class/Db.php");
    extract($_POST);
    $db = new Database("localhost", "root", "", "bookingfe");
    $userInstance = new User($db);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $userInstance->Register($name, $surname, $email, $passwordHash);
   $response = [
    "post" => $_POST
   ];
   echo json_encode($response);
}

?>