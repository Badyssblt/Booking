<?php

class User {

    private $database;

    public function __construct($db){
        $this->database = $db;
    }

    public function Register($name, $surname, $email, $password){
        $sql = "INSERT INTO users VALUES (0, :name, :surname, :email, :password)";
        $params = array("name" => $name, "surname" => $surname, "email" => $email, "password" => $password);
        $account = $this->database->create($sql, $params); 
    }

    public function Login($email, $password){
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = array("email" => $email);
        $user = $this->database->query($sql, $params);
        if(empty($user)){
            $response = [
                "response_code" => "200",
                "message" => "Email ou mot de passe incorrect",
                "action" => "false"
            ];
            return $response;
        }else {
            $passwordHash = $user[0]["password"];
            $passwordReq = password_verify($password, $passwordHash);
        if($passwordReq){
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["ID"] = $user[0]['ID'];
            $response = [
                "response_code" => 200,
                "message" => "connecté",
                "action" => "connect",
                "session" => $_SESSION
            ];
            return $response;
        }else {
            $response = [
                "response_code" => "200",
                "message" => "Email ou mot de passe incorrect",
                "action" => "false"
            ];
            return $response;
        }
        }  
    }

    public function Logout(){
        if(isset($_SESSION)){
            session_destroy();
        }else {
            echo "Vous n'êtes pas connecté";
        }
    }

    public function updatePassword($password){
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $ID = $_SESSION["ID"];
        $email = $_SESSION["email"];
        $changeEmail = $this->database->update("UPDATE users SET password = '$passwordHash' WHERE ID = 2");
        echo "Mot de passe changé";
    }

}

?>