<?php
require_once ("Score.php");

class ScoreGateway{
    private $con;
    function __construct(myDB $db){
        $this->con = $db;
    }


    function insererDansBase($t, $val, $p){
        $score = "";
        $id="";
        $i=0;
        $query = "SELECT Id,score FROM '$t' ORDER BY score DESC";
        $rows = $this->con->query($query);
        while ($row = $rows->fetchArray()){
            $i = $i+1;
            if($i == 10){
                $score = $row['score'];
                $id = $row['Id'];
            }
        }
        if($val > $score){
            $query = "UPDATE '$t' SET score='$val' WHERE Id = '$id'";
            $this->con->query($query);
            $query = "UPDATE '$t' SET Pseudo='$p' WHERE Id = '$id'";
            $this->con->query($query);
        }
    }

    function remiseAZero($t){
        $i=1;
        while($i<11){
            $j = "Joueur".$i;
            $query = "UPDATE '$t' SET score=0 WHERE Id='$i'";
            $rows=$this->con->query($query);
            $query = "UPDATE '$t' SET Pseudo='$j' WHERE Id='$i'";
            $rows=$this->con->query($query);
            $i = $i+1;
        }
    }


    function findAll($t):array{
        //décommenter pour remettre les hoghscores à zéro
        //$this->remiseAZero($t);
        $query = "SELECT score,Pseudo FROM '$t' ORDER BY score DESC";
        $rows = $this->con->query($query);
        $tab = array();
        while($row = $rows->fetchArray()){
            $score = new Score($row['score'], $row['Pseudo']);
            array_push($tab, $score);
        }
        return $tab;
    }


}