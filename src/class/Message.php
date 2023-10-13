<?php

class Message
{
    private $database;

    public function __construct($db){
        $this->database = $db;
    }

    public function sendMessage($message, $author, $recipient){
        $sql = "INSERT INTO messages VALUES(0, :author, :message, :recipient, DEFAULT)";
        $params = array("author" => $author, "message" => $message, "recipient" => $recipient);
        $stmt = $this->database->create($sql, $params);
    }

    public function getMessage($author, $recipient){
        $sql = "SELECT * FROM messages WHERE (author = '$author' AND recipient = '$recipient') OR (author = '$recipient' AND recipient = '$author')";
        $stmt = $this->database->query($sql);
        return $stmt;
    }

    
}

