<?php

class Reservation {

    private $database;

    public function __construct($db){
        $this->database = $db;
    }

    public function Book($userID, $reservationID, $dateDebut, $dateFin){
        $sql = "INSERT INTO book VALUES (0, :userID, :reservationID, :date_debut, :date_fin, 0)";
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

    public function getBookByFilter($name = null, $animal = null, $wifi = null, $chamber = null){
        $sql = "SELECT * FROM reservations WHERE nom LIKE '%$name%'";
        if(isset($chamber)){
            $sql .= " AND chambre = '$chamber'";
        }
        if(isset($animal)){
            $sql .= " AND animaux = '$animal'";
        }
        if(isset($wifi)){
            $sql .= " AND wifi = '$wifi'";
        }
        $stmt = $this->database->query($sql);
        return $stmt;
    }

}

?>