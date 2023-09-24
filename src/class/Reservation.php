<?php

class Reservation {

    private $database;

    public function __construct($db){
        $this->database = $db;
    }

    public function Book($userID, $reservationID){
        $stmt = $this->database->query("SELECT * FROM books WHERE userID = '$userID' AND reservationID = '$reservationID'");

    }

    public function getBookByID($id){
        $stmt = $this->database->query("SELECT * FROM reservations WHERE ID = '$id'");
        return $stmt;
    }

}

?>