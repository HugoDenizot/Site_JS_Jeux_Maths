<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/Commun.css">
    <link rel="stylesheet" type="text/css" href="../css/Popup.css">
    <link rel="stylesheet" type="text/css" href="../css/BoutonsJeux.css">
    <link rel="stylesheet" type="text/css" href="../css/TabExp.css">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Exo+2|Fjalla+One|Slabo+27px|Staatliches&display=swap" rel="stylesheet">
    <title>Jeu Exposants</title>
</head>

<body onload="openPopupBase()">


<div class="divTitre">
    <h1 class="titre">Jeu</h1>
    <h1 class="titre">Exposants</h1>
</div>

<div class="menu">
    <div>
        <h1 class="titre2">Exposants</h1>
        <a class="titre3" href="JeuExposant.php">Jeu<br/></a>
        <a class="titre3" href="CoursExposants.html">Cours</a>
    </div>
    <div>
        <h1 class="titre2"> Modulos</h1>
        <a class="titre3" href="JeuModulo.php">Jeu<br/></a>
        <a class="titre3" href="CoursModulo.html">Cours</a>
    </div>
    <footer>
        <a href="Accueil.html">Accueil</a>
    </footer>
</div>

<div class="Placement">
    <button onclick="openPopupAide()">
        <a>Aide</a>
    </button>
</div>

<div id="overlayPopup-3" class="overlayPopup-1">
    <div id="Popup-3" class="Popup-1">
        <h2>
            Veuillez choisir les bases du jeu
            <div><br /></div>
            <div id="divSelectBase">
                <div>
                    <input type="checkbox" id="SelectBase2" name="SelectBase">
                    <label for="SelectBase"><h2>2</h2></label>
                </div>
                <div>
                    <input type="checkbox" id="SelectBase3" name="SelectBase">
                    <label for="SelectBase"><h2>3</h2></label>
                </div>
                <div>
                    <input type="checkbox" id="SelectBase4" name="SelectBase">
                    <label for="SelectBase"><h2>4</h2></label>
                </div>
                <div>
                    <input type="checkbox" id="SelectBase5" name="SelectBase">
                    <label for="SelectBase"><h2>5</h2></label>
                </div>
                <div>
                    <input type="checkbox" id="SelectBase6" name="SelectBase">
                    <label for="SelectBase"><h2>6</h2></label>
                </div>
                <div>
                    <input type="checkbox" id="SelectBase7" name="SelectBase">
                    <label for="SelectBase"><h2>7</h2></label>
                </div>
                <div>
                    <input type="checkbox" id="SelectBase8" name="SelectBase">
                    <label for="SelectBase"><h2>8</h2></label>
                </div>
                <div>
                    <input type="checkbox" id="SelectBase9" name="SelectBase">
                    <label for="SelectBase"><h2>9</h2></label>
                </div>
                <div>
                    <input type="checkbox" id="SelectBase9" name="SelectBase">
                    <label for="SelectBase"><h2>A</h2></label>
                </div>
                <div>
                    <input type="checkbox" id="SelectBase9" name="SelectBase">
                    <label for="SelectBase"><h2>B</h2></label>
                </div>

            </div>
            <div>
                <select id="SelectPopup3">
                    <option value="1">Facile</option>
                    <option value="3">Normal</option>
                    <option value="5">Difficile</option>
                </select>
            </div>
            <button onclick="chargerBase();">
                <a>Valider</a>
            </button>
        </h2>
    </div>
</div>

<div class="boutonJeu">
    <div class="score">
        <div>Score:</div>
        <div id="highscore"> </div>
    </div>
    <button onclick="recommencer()">
        <a>Recommencer<br /></a>
    </button>
    <div class="SpaceBet"></div>
    <button onclick="remplirTableaux(6)">
        <a>Remplir<br /></a>
    </button>
    <button onclick="viderTableau()">
        <a>Effacer</a>
    </button>
    <button onclick="valider()">
        <a>Valider<br /></a>
    </button>
    <div class="SpaceBet"></div>
    <button onclick="swapItem()">
        <a>Swap<sup>2</sup></a>
    </button>
    <button onclick="openPopup();">
        <a>Changement Base <sup>4</sup></a>
    </button>
    <button onclick="changementExpo();">
        <a>Opposer exposant<sup>2</sup></a>
    </button>
    <button onclick="highscore();">
        <a>highscore</a>
    </button>
</div>

<table id="TableauJeu">
    <tr>
        <td onclick="selectItem(this,1,1)"  class="UnSelectedItem"><span id="1001"></span><sup id="1001sup"></sup></td>
        <td onclick="selectItem(this,2,1)"  class="UnSelectedItem"><span id="1002"></span><sup id="1002sup"></sup></td>
        <td onclick="selectItem(this,3,1)"  class="UnSelectedItem"><span id="1003"></span><sup id="1003sup"></sup></td>
        <td onclick="selectItem(this,4,1)"  class="UnSelectedItem"><span id="1004"></span><sup id="1004sup"></sup></td>
        <td onclick="selectItem(this,5,1)"  class="UnSelectedItem"><span id="1005"></span><sup id="1005sup"></sup></td>
        <td onclick="selectItem(this,6,1)"  class="UnSelectedItem"><span id="1006"></span><sup id="1006sup"></sup></td>
    </tr>
    <tr>
        <td onclick="selectItem(this,1,2)" class="UnSelectedItem"><span id="2001"></span><sup id="2001sup"></sup></td>
        <td onclick="selectItem(this,2,2)" class="UnSelectedItem"><span id="2002"></span><sup id="2002sup"></sup></td>
        <td onclick="selectItem(this,3,2)" class="UnSelectedItem"><span id="2003"></span><sup id="2003sup"></sup></td>
        <td onclick="selectItem(this,4,2)" class="UnSelectedItem"><span id="2004"></span><sup id="2004sup"></sup></td>
        <td onclick="selectItem(this,5,2)" class="UnSelectedItem"><span id="2005"></span><sup id="2005sup"></sup></td>
        <td onclick="selectItem(this,6,2)" class="UnSelectedItem"><span id="2006"></span><sup id="2006sup"></sup></td>
    </tr>
    <tr>
        <td onclick="selectItem(this,1,3)" class="UnSelectedItem"><span id="3001"></span><sup id="3001sup"></sup></td>
        <td onclick="selectItem(this,2,3)" class="UnSelectedItem"><span id="3002"></span><sup id="3002sup"></sup></td>
        <td onclick="selectItem(this,3,3)" class="UnSelectedItem"><span id="3003"></span><sup id="3003sup"></sup></td>
        <td onclick="selectItem(this,4,3)" class="UnSelectedItem"><span id="3004"></span><sup id="3004sup"></sup></td>
        <td onclick="selectItem(this,5,3)" class="UnSelectedItem"><span id="3005"></span><sup id="3005sup"></sup></td>
        <td onclick="selectItem(this,6,3)" class="UnSelectedItem"><span id="3006"></span><sup id="3006sup"></sup></td>
    </tr>
    <tr>
        <td onclick="selectItem(this,1,4)" class="UnSelectedItem"><span id="4001"></span><sup id="4001sup"></sup></td>
        <td onclick="selectItem(this,2,4)" class="UnSelectedItem"><span id="4002"></span><sup id="4002sup"></sup></td>
        <td onclick="selectItem(this,3,4)" class="UnSelectedItem"><span id="4003"></span><sup id="4003sup"></sup></td>
        <td onclick="selectItem(this,4,4)" class="UnSelectedItem"><span id="4004"></span><sup id="4004sup"></sup></td>
        <td onclick="selectItem(this,5,4)" class="UnSelectedItem"><span id="4005"></span><sup id="4005sup"></sup></td>
        <td onclick="selectItem(this,6,4)" class="UnSelectedItem"><span id="4006"></span><sup id="4006sup"></sup></td>
    </tr>
    <tr>
        <td onclick="selectItem(this,1,5)" class="UnSelectedItem"><span id="5001"></span><sup id="5001sup"></sup></td>
        <td onclick="selectItem(this,2,5)" class="UnSelectedItem"><span id="5002"></span><sup id="5002sup"></sup></td>
        <td onclick="selectItem(this,3,5)" class="UnSelectedItem"><span id="5003"></span><sup id="5003sup"></sup></td>
        <td onclick="selectItem(this,4,5)" class="UnSelectedItem"><span id="5004"></span><sup id="5004sup"></sup></td>
        <td onclick="selectItem(this,5,5)" class="UnSelectedItem"><span id="5005"></span><sup id="5005sup"></sup></td>
        <td onclick="selectItem(this,6,5)" class="UnSelectedItem"><span id="5006"></span><sup id="5006sup"></sup></td>
    </tr>
    <tr>
        <td onclick="selectItem(this,1,6)" class="UnSelectedItem"><span id="6001"></span><sup id="6001sup"></sup></td>
        <td onclick="selectItem(this,2,6)" class="UnSelectedItem"><span id="6002"></span><sup id="6002sup"></sup></td>
        <td onclick="selectItem(this,3,6)" class="UnSelectedItem"><span id="6003"></span><sup id="6003sup"></sup></td>
        <td onclick="selectItem(this,4,6)" class="UnSelectedItem"><span id="6004"></span><sup id="6004sup"></sup></td>
        <td onclick="selectItem(this,5,6)" class="UnSelectedItem"><span id="6005"></span><sup id="6005sup"></sup></td>
        <td onclick="selectItem(this,6,6)" class="UnSelectedItem"><span id="6006"></span><sup id="6006sup"></sup></td>
    </tr>
    <tr>
        <td onclick="selectItem(this,1,7)" class="UnSelectedItem"><span id="7001"></span><sup id="7001sup"></sup></td>
        <td onclick="selectItem(this,2,7)" class="UnSelectedItem"><span id="7002"></span><sup id="7002sup"></sup></td>
        <td onclick="selectItem(this,3,7)" class="UnSelectedItem"><span id="7003"></span><sup id="7003sup"></sup></td>
        <td onclick="selectItem(this,4,7)" class="UnSelectedItem"><span id="7004"></span><sup id="7004sup"></sup></td>
        <td onclick="selectItem(this,5,7)" class="UnSelectedItem"><span id="7005"></span><sup id="7005sup"></sup></td>
        <td onclick="selectItem(this,6,7)" class="UnSelectedItem"><span id="7006"></span><sup id="7006sup"></sup></td>
    </tr>
    <tr>
        <td onclick="selectItem(this,1,8)" class="UnSelectedItem"><span id="8001"></span><sup id="8001sup"></sup></td>
        <td onclick="selectItem(this,2,8)" class="UnSelectedItem"><span id="8002"></span><sup id="8002sup"></sup></td>
        <td onclick="selectItem(this,3,8)" class="UnSelectedItem"><span id="8003"></span><sup id="8003sup"></sup></td>
        <td onclick="selectItem(this,4,8)" class="UnSelectedItem"><span id="8004"></span><sup id="8004sup"></sup></td>
        <td onclick="selectItem(this,5,8)" class="UnSelectedItem"><span id="8005"></span><sup id="8005sup"></sup></td>
        <td onclick="selectItem(this,6,8)" class="UnSelectedItem"><span id="8006"></span><sup id="8006sup"></sup></td>
    </tr>
    <tr>
        <td onclick="selectItem(this,1,9)" class="UnSelectedItem"><span id="9001"></span><sup id="9001sup"></sup></td>
        <td onclick="selectItem(this,2,9)" class="UnSelectedItem"><span id="9002"></span><sup id="9002sup"></sup></td>
        <td onclick="selectItem(this,3,9)" class="UnSelectedItem"><span id="9003"></span><sup id="9003sup"></sup></td>
        <td onclick="selectItem(this,4,9)" class="UnSelectedItem"><span id="9004"></span><sup id="9004sup"></sup></td>
        <td onclick="selectItem(this,5,9)" class="UnSelectedItem"><span id="9005"></span><sup id="9005sup"></sup></td>
        <td onclick="selectItem(this,6,9)" class="UnSelectedItem"><span id="9006"></span><sup id="9006sup"></sup></td>
    </tr>
    <tr>
        <td onclick="selectItem(this,1,10)" class="UnSelectedItem"><span id="10001"></span><sup id="10001sup"></sup></td>
        <td onclick="selectItem(this,2,10)" class="UnSelectedItem"><span id="10002"></span><sup id="10002sup"></sup></td>
        <td onclick="selectItem(this,3,10)" class="UnSelectedItem"><span id="10003"></span><sup id="10003sup"></sup></td>
        <td onclick="selectItem(this,4,10)" class="UnSelectedItem"><span id="10004"></span><sup id="10004sup"></sup></td>
        <td onclick="selectItem(this,5,10)" class="UnSelectedItem"><span id="10005"></span><sup id="10005sup"></sup></td>
        <td onclick="selectItem(this,6,10)" class="UnSelectedItem"><span id="10006"></span><sup id="10006sup"></sup></td>
    </tr>
</table>


<!-- POP UP pour changement de Base -->
<div id="overlayPopup-1" class="overlayPopup-1">
    <div id="Popup-1" class="Popup-1">
        <h2>Veuillez choisir une nouvelle base
            <span id="btnClosePopup-1" class="btnClose">&times;</span>
            <select id="SelectPopup">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
            <button onclick="changementBase();">
                <a>Valider</a>
            </button>
        </h2>
    </div>
</div>

<!-- Popup highscore -->
<div id="overlayPopup-5" class="overlayPopup-1">
    <div id="Popup-5" class="Popup-1">
        <?php
        $tScore = array();
        require_once ("../PHP/ScoreGateway.php");
        require_once ("../PHP/myDB.php");
        $sg = new ScoreGateway(new myDB());
        $tScore = $sg->findAll('Exposants');
        if($tScore != null){
            foreach ($tScore as $rows){
                echo '<h2>'.$rows->getPseudo().' : '.$rows->getVal().'</h2>';
            }
        }else{
            echo'<h2 value="vide">Pas de highscore</h2>';
        }
        ?>
        <button onclick="fermerhighscore()">
            <a>Compris</a>
        </button>
    </div>
</div>

<!-- POP UP pour HELP -->
<div id="overlayPopup-2" class="overlayPopup-2">
    <div id="Popup-2" class="Popup-2" >
        <h2> Règles du jeu </h2>
        <span id="btnClosePopup-2" class="btnClose">&times;</span>
        <div>
            <h2>
                <br>
                Le but du jeu est de faire le plus gros score en créant le plus de chemins valides possibles.<br>
                Le chemin est considéré valide si la multiplication de tous ses termes fait 1. <br><br>

                Pour faire votre chemin valide vous pouvez utiliser les outils qui sont mis à votre disposition. <br>
                Cependant, attention car leur utilisation entraîne un rajout de cases dans le tableaux.<br>

                Lorsque l'une des colonnes est pleine alors le jeu se termine.<br>
                Plus la difficulté augmente plus il y a de points à gagner pour un même chemin.
            </h2>
        </div>
        <button onclick="fermerPageAide()">
            <a>Compris</a>
        </button>
    </div>
</div>

<!-- POP UP pour partie terminée -->
<div id="overlayPopup-4" class="overlayPopup-4">
    <div id="Popup-4" class="Popup-4">
        <h2> Partie Terminée </h2>
        <!--<span id="btnClosePopup-4" class="btnClose">&times;</span>-->
        <div>
            <form method="post" action="../PHP/index.php?action=finJeu">
                pseudo : <input type="text" name="Pseudo" size="12" required="pseudo" maxlength="10"> <br>
                <input type="hidden" name="type" value="Exposants"/>
                score : <a name="score">score : </a>
                <input type="hidden" name="Score" value="non">
                <input type="submit" value="terminer">
            </form>
        </div>
    </div>
</div>

<script src="../Scripts/MainExposant.js"></script>

</body>
</html>