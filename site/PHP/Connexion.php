<?php


class Connexion extends PDO{
    private $pdo;

    function __construct(){
        try{
            $pdo=new PDO('sqlite:highscore.db');
            /*$pdo = new PDO('sqlite:'.dirname(__FILE__).'/highscore.db');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT*/
        } catch(Exception $e) {
            echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
            die();
        }
    }


    function executeQuery(string $query) :bool{
        $this->stmt =parent::prepare($query);
        $this->stmt->execute();
        return $this->stmt->execute();
    }

    public function getResults() : array {
        return $this->stmt->fetchall();
    }
}