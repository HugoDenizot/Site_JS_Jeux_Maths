<?php
require_once ("ScoreGateway.php");
require_once ("PartieGateway.php");

class Controlleur
{
    private $PDO;
    function __construct(myDB $db){
        $this->PDO = $db;

        $action= $_REQUEST['action'];
        switch ($action) {

            case 'finJeu':
                $this->finJeu();
                break;

                case 'finPartie':
                $this->finPartie();
                break;

            default:
                return;
        }
    }

    function highscore(){
        $sg = new ScoreGateway($this->PDO);
        $tScore = $sg->findAll($_POST['type']);
        require_once ("../html/Highscore.php");
    }

    function finJeu(){
        //On crée un résumé de notre requête POST:
        $messageIdent = md5($_POST['type'] . $_POST['Score'] . $_POST['Pseudo']);

        //On le compare à la valeur stockée:
        $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:'';

        //si les valeurs sont différentes
        if($messageIdent!=$sessionMessageIdent){
            //sauvegarde les données de la requête et on fait notre code
            $_SESSION['messageIdent'] = $messageIdent;
            $sg = new ScoreGateway($this->PDO);
            $sg->insererDansBase($_POST['type'], $_POST['Score'], $_POST['Pseudo']);
        }
        $this->highscore();
    }

    function finPartie(){
        $messageIdent = md5($_POST['type'] . $_POST['Score1'] . $_POST['Pseudoj1']);

        //On le compare à la valeur stockée:
        $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:'';

        //si les valeurs sont différentes
        if($messageIdent!=$sessionMessageIdent){
            //sauvegarde les données de la requête et on fait notre code
            $_SESSION['messageIdent'] = $messageIdent;
            $sg = new ScoreGateway($this->PDO);
            $sg->insererDansBase($_POST['type'], $_POST['Score1'], $_POST['Pseudoj1']);
            $sg->insererDansBase($_POST['type'], $_POST['Score2'], $_POST['Pseudoj2']);
        }
        $this->highscore();
    }
}