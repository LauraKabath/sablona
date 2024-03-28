<?php

namespace otazkaodpovede;
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/db/config.php');

use mysql_xdevapi\Exception;
use PDO;
class QNA{
    private $conn;
    public function __construct(){
        $this->connect();
    }
    private function connect(){
        $config = DATABASE;

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try {
            $this->conn = new PDO('mysql:host='.$config['HOST'].
                ';dbname='.$config['DBNAME'].';port='.$config['PORT'],
                $config['USER_NAME'], $config['PASSWORD'], $options);
        } catch (\PDOException $e){
            die("Chyba pripojenia: ".$e->getMessage());
        }
    }

    public function insertQnA(){
        try {
            //Nacitanie JSON suboru
            $data = json_decode(file_get_contents(__ROOT__.'/data/datas.json'), true);
            $otazky = $data["otazky"];
            $odpovede = $data["odpovede"];
            //Vlozenie otazok a odpovedi v ramci transakcie
            $this->conn->beginTransaction();

            $sql = "INSERT INTO qna (otazka, odpoved)
VALUES (:otazka, :odpoved)";
            $statement = $this->conn->prepare($sql);

            for ($i = 0; $i < count($otazky); $i++){
                $statement->bindParam(':otazka', $otazky[$i]);
                $statement->bindParam(':odpoved', $odpovede[$i]);
                $statement->execute();
            }
            $this->conn->commit();
            echo "Data boli vlozene";
        } catch (Exception $e){
            //Zobrazenie chyboveho hlasenia
            echo "Chyba pri vkladani dat do databazy ".$e->getMessage();
            $this->conn->rollback(); //Vratenie spat zmien v pripade chyby
        } finally {
            //uzatvorenie spojenia
            $this->conn = null;
        }

    }
}