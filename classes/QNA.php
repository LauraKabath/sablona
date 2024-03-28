<?php

namespace otazkaodpovede;
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/db/config.php');

use PDO;

class QNA {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $config = DATABASE;

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try {
            $this->conn = new PDO('mysql:host='.$config['HOST'].
                ';dbname='.$config['DBNAME'].';port='.$config['PORT'],
                $config['USER_NAME'], $config['PASSWORD'], $options);
        } catch (\PDOException $e) {
            die("Chyba pripojenia: ".$e->getMessage());
        }
    }

    public function insertQnA() {
        try {
            //Nacitanie JSON suboru
            $data = json_decode(file_get_contents(__ROOT__.'/data/datas.json'), true);
            $otazky = $data["otazky"];
            $odpovede = $data["odpovede"];
            //Vlozenie otazok a odpovedi v ramci transakcie
            $this->conn->beginTransaction();

            $sql = "INSERT INTO qna (otazka, odpoved) VALUES (:otazka, :odpoved)";
            $statement = $this->conn->prepare($sql);

            for ($i = 0; $i < count($otazky); $i++) {
                $statement->bindParam(':otazka', $otazky[$i]);
                $statement->bindParam(':odpoved', $odpovede[$i]);
                $statement->execute();
            }
            $this->conn->commit();
            echo "Data boli vlozene";
        } catch (\PDOException $e) {
            //Zobrazenie chyboveho hlasenia
            echo "Chyba pri vkladani dat do databazy ".$e->getMessage();
            $this->conn->rollback(); //Vratenie spat zmien v pripade chyby
        }
    }

    public function nacitajdatabazu() {
        try {
            $query = "SELECT DISTINCT otazka, odpoved FROM qna"; //sql dotaz, ktory vyberie unikatnu kombinaciu otazka-odpoved z tabulky qna
            $statement = $this->conn->prepare($query); //pripravy dotaz
            $statement->execute(); //spusti pripraveny dotaz

            $result = $statement->fetchAll(); //zachytenie dat z databazy
            echo '<section class="container">';
            foreach ($result as $r) { //vypise otazku a k nej prisluchajucu odpoved do akordeonu
                echo '<div class="accordion">
                    <div class="question"><strong>' .$r["otazka"]. '</strong></div>
                    <div class="answer">' . $r["odpoved"] . '</div>
                </div>';
            }
            echo '</section>';

        } catch (\PDOException $exception) {
            echo "Chyba pri nacitani udajov z databazy".$exception->getMessage(); //zachyti chyby, ktore mozu nastat
            $this->conn->rollback(); //v pripade chyby vrati spat zmeny
        }
    }
}
