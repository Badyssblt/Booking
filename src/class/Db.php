<?php
class Database {

    public $connection;


    public function __construct($host, $username, $password, $db){
        $this->connection = new PDO('mysql:host=' . $host . ';dbname=' . $db, $username, $password);
    }

    public function query($sql, $params = array()){
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($params);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function create($sql, $params){
        try  {
            $statement = $this->connection->prepare($sql);
            $statement->execute($params);
        }catch (PDOException $e){
            echo $e;
        }
    }

    public function update($sql){
            $statement = $this->connection->prepare($sql);
            $statement->execute();
    }

    public function remove($sql){
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }
}


?>