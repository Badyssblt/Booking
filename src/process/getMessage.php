<?php
session_start();
require(__DIR__ . "/../class/Message.php");
require(__DIR__ . "/../class/Db.php");
    $db = new Database("localhost", "root", "", "bookingfe");
    $messages = new Message($db);
    $author = $_SESSION['ID'];
    $recipient = $_GET['RecipientID'];
    $allMessages = $messages->getMessage($author, $recipient);
    $response = $allMessages;

echo json_encode($response);

?>