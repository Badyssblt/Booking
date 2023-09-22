<?php

class Favorite {

    private $database;

    public function __construct ($db){
        $this->database = $db;
    }

    public function addFavorite($userID, $productID){
        $exist = $this->database->query("SELECT * FROM favorites WHERE productID = '$productID' AND userID = '$userID' ");
        if(!$exist){
            $stmt = $this->database->create("INSERT INTO favorites VALUES(0, :userID, :productID)", array("userID" => $userID, "productID" => $productID));
            echo "Favoris ajouté";
        }else {
            echo "Favoris déjà ajouté";
        }
    }

    public function removeFavorite($userID, $productID){
        $stmt = $this->database->remove("DELETE from favorites WHERE userID = '$userID' AND productID = '$productID' ");
        
    }

}

?>