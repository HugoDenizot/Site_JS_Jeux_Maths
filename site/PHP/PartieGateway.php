<?php


class PartieGateway
{
    private $con;

    function __construct(myDB $con){
        $this->con = $con;
    }

    function mettreAJour(int $id, array $tab){
        $i = 0;
        foreach ($tab as $t){
            $rang = $t[$i];
            $a = 0;
            while($a < 15){
                $val = $t[$i][$a];
                $query = "UPDATE Partie set '$rang'='$val' WHERE id = '$id'";
                $this->con->query($query);
                $a = $a+1;
            }
            $i = $i+1;
        }
    }

}