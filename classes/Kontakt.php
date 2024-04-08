<?php

namespace formular;
error_reporting(E_ALL); //zapnutie chybovych hlaseni
ini_set("display_errors", "On");
require_once(__ROOT__.'/classes/Database.php');

use mysql_xdevapi\Exception;

class Kontakt extends \Database {
     protected $connection;

    public function __construct(){
        $this->connect();
        // Pouzitie gettera na ziskanie spojenia
        $this->connection = $this->getConnection();
    }

    public function ulozitSpravu($meno, $email, $sprava){
        $sql = "INSERT INTO udaje(meno, email, sprava)
    VALUES ('".$meno."',''".$email."','".$sprava."')";
        $statement = $this->connection->prepare($sql);

        try {
            $insert = $statement->execute();
            header("Location: http://localhost/sablonautorok/sablona/thankyou.php");
            http_response_code(200);
            return $insert;
        } catch (Exception $exception){
            return http_response_code(404);
        }
    }
    public function __destruct(){
        $this->conn = null;
    }

}