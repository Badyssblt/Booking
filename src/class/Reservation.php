<?php

class Reservation {

    private $database;

    public function __construct($db){
        $this->database = $db;
    }

    public function Book($userID, $reservationID, $dateDebut, $dateFin){
        $sql = "INSERT INTO book VALUES (0, :userID, :reservationID, :date_debut, :date_fin)";
        $params = array("userID" => $userID, "reservationID" => $reservationID, "date_debut" => $dateDebut, "date_fin" => $dateFin);
        $stmt = $this->database->create($sql, $params);
    }

    public function getBookByuserID($userID){
        $stmt = $this->database->query("SELECT * FROM reservations INNER JOIN book ON reservations.ID = book.reservationID WHERE book.userID = '$userID'");
        return $stmt;
    }

    public function getBookById($id){
        $stmt = $this->database->query("SELECT * FROM reservations WHERE ID = '$id'");
        return $stmt;
    }

}

?>