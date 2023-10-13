<?php
session_start();
require(__DIR__ . "/../class/Message.php");
require(__DIR__ . "/../class/Db.php");
if(isset($_POST)){
    extract($_POST);

    $db = new Database("localhost", "root", "", "bookingfe");
    $messages = new Message($db);
    $messages->sendMessage($message, $author, $recipient);
    $response = [
        "message" => "Message envoyé",
        "post" => $_POST
    ];
}else {
    $response = [
        "message" => "Veuillez vous connectez"
    ];
}

echo json_encode($response);




?>