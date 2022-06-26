<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/Commun.css">
    <link rel="stylesheet" type="text/css" href="../css/BoutonsJeux.css">
    <link rel="stylesheet" type="text/css" href="../css/TabMod.css">
    <link rel="stylesheet" type="text/css" href="../css/Pioche.css">
    <link rel="stylesheet" type="text/css" href="../css/Popup.css">
    <link rel="stylesheet" type="text/css" href="../css/Drag&drop.css">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Exo+2|Fjalla+One|Slabo+27px|Staatliches&display=swap" rel="stylesheet">
    <title>Jeu Modulo</title>
</head>

<body onload="ouvrirPage()">
<div class="divTitre">
    <h1 class="titre">Jeu</h1>
    <h1 class="titre">Modulo</h1>
</div>

<div class="menu">
    <div>
        <h1 class="titre2" href="#" role="button">Exposants</h1>
        <a class="titre3" href="JeuExposant.php">Jeu<br/></a>
        <a class="titre3" href="CoursExposants.html">Cours</a>
    </div>

    <div>
        <h1 class="titre2" href="#" role="button">Modulos</h1>
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

<div class="boutonJeu2">
    <div class="score1">
        <div>Score j1 :</div>
        <div id="highscore1">0</div>
    </div>

    <div id="overlayPopup-6">
        <div class="score2">
            <div>Score j2 :</div>
            <div id="highscore2">0</div>
        </div>
    </div>

    <button>
        <a onclick="recommencer()">Recommencer<br/></a>
    </button>
    <button>
        <a onclick="valider()">Valider<br/></a>
    </button>
    <button onclick="highscore();">
        <a>highscore</a>
    </button>

    <button onclick="finPartie();">
        <a>Finir la partie</a>
    </button>
</div>

<!-- POP UP pour partie terminée -->
<div id="overlayPopup-4" class="overlayPopup-4">
    <div id="Popup-4" class="Popup-4">
        <h2> Partie Terminée </h2>
        <div>
            <form method="post" action="../PHP/index.php?action=finPartie">
                pseudo j1 : <input type="text" name="Pseudoj1" size="12" required="pseudo" maxlength="10"> <br>
                <input type="hidden" name="type" value="Exposants"/>
                score j1 : <a name="scorej1">score : </a><br>

                pseudo j2 : <input type="text" name="Pseudoj2" size="12" required="pseudo" maxlength="10"> <br>
                <input type="hidden" name="type" value="Modulos"/>
                score j2 : <a name="scorej2">score : </a><br>

                <input type="hidden" name="Score1" value="non">
                <input type="hidden" name="Score2" value="non">
                <input type="submit" value="terminer">
            </form>
        </div>
    </div>
</div>


<!-- jeu joueur 1 -->
<div id="overlayPopup-7">
    <div>Jeu joueur 1</div>
    <table id="piochej1" class="dropzone">
        <tr id="jetonj1">
            <td id="draggable-1" class="draggable" draggable="true" ondragstart="onDragStart(event);">10</td>
            <td id="draggable-2" class="draggable" draggable="true" ondragstart="onDragStart(event);">7</td>
            <td id="draggable-3" class="draggable" draggable="true" ondragstart="onDragStart(event);">8</td>
            <td id="draggable-4" class="draggable" draggable="true" ondragstart="onDragStart(event);">8</td>
            <td id="draggable-5" class="draggable" draggable="true" ondragstart="onDragStart(event);">5</td>
            <td id="draggable-6" class="draggable" draggable="true" ondragstart="onDragStart(event);">4</td>
            <td id="draggable-7" class="draggable" draggable="true" ondragstart="onDragStart(event);">1</td>
        </tr>
    </table>
</div>

<!-- jeu joueur 2 -->
<div id="overlayPopup-8" >
    <div>Jeu joueur 2</div>
    <table id="piochej2" class="dropzone">
        <tr id="jetonj2">
            <td id="draggable-22" class="draggable" draggable="true" ondragstart="onDragStart(event);">10</td>
            <td id="draggable-23" class="draggable" draggable="true" ondragstart="onDragStart(event);">7</td>
            <td id="draggable-24" class="draggable" draggable="true" ondragstart="onDragStart(event);">8</td>
            <td id="draggable-25" class="draggable" draggable="true" ondragstart="onDragStart(event);">8</td>
            <td id="draggable-26" class="draggable" draggable="true" ondragstart="onDragStart(event);">5</td>
            <td id="draggable-27" class="draggable" draggable="true" ondragstart="onDragStart(event);">4</td>
            <td id="draggable-28" class="draggable" draggable="true" ondragstart="onDragStart(event);">1</td>
        </tr>
    </table>
</div>


<table id="opérations" class="dropzone">
    <tr id="jeton2">
        <td id="draggable-8" class="draggable" draggable="true" ondragstart="onDragStart(event);">+</td>
        <td id="draggable-9" class="draggable" draggable="true" ondragstart="onDragStart(event);">-</td>
        <td id="draggable-10" class="draggable" draggable="true" ondragstart="onDragStart(event);">x</td>
        <td id="draggable-11" class="draggable" draggable="true" ondragstart="onDragStart(event);">(</td>
        <td id="draggable-12" class="draggable" draggable="true" ondragstart="onDragStart(event);">)</td>
    </tr>
</table>

<table id="chiffres" class="dropzone">
    <tr id="jeton3">
        <td id="draggable-13" class="draggable" draggable="true" ondragstart="onDragStart(event);">[2]</td>
        <td id="draggable-14" class="draggable" draggable="true" ondragstart="onDragStart(event);">[3]</td>
        <td id="draggable-15" class="draggable" draggable="true" ondragstart="onDragStart(event);">[4]</td>
        <td id="draggable-16" class="draggable" draggable="true" ondragstart="onDragStart(event);">[5]</td>
        <td id="draggable-17" class="draggable" draggable="true" ondragstart="onDragStart(event);">[6]</td>
        <td id="draggable-19" class="draggable" draggable="true" ondragstart="onDragStart(event);">[7]</td>
        <td id="draggable-20" class="draggable" draggable="true" ondragstart="onDragStart(event);">[8]</td>
        <td id="draggable-21" class="draggable" draggable="true" ondragstart="onDragStart(event);">[9]</td>
    </tr>
</table>

<table id="tabModulo" ondrop="onDrop(event);" ondragover="onDragOver(event)">
    <tr>
        <td class="rouge" id="1_1"></td>
        <td class="plateau" id="1_2"></td>
        <td class="plateau" id="1_3"></td>
        <td class="bleuC" id="1_4"></td>
        <td class="plateau" id="1_5"></td>
        <td class="plateau" id="1_6"></td>
        <td class="plateau" id="1_7"></td>
        <td class="rouge" id="1_8"></td>
        <td class="plateau" id="1_9"></td>
        <td class="plateau" id="1_10"></td>
        <td class="plateau" id="1_11"></td>
        <td class="bleuC" id="1_12"></td>
        <td class="plateau" id="1_13"></td>
        <td class="plateau" id="1_14"></td>
        <td class="rouge" id="1_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="2_1"></td>
        <td class="rose" id="2_2"></td>
        <td class="plateau" id="2_3"></td>
        <td class="plateau" id="2_4"></td>
        <td class="plateau" id="2_5"></td>
        <td class="bleuF" id="2_6"></td>
        <td class="plateau" id="2_7"></td>
        <td class="plateau" id="2_8"></td>
        <td class="plateau" id="2_9"></td>
        <td class="bleuF" id="2_10"></td>
        <td class="plateau" id="2_11"></td>
        <td class="plateau" id="2_12"></td>
        <td class="plateau" id="2_13"></td>
        <td class="rose" id="2_14"></td>
        <td class="plateau" id="2_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="3_1"></td>
        <td class="plateau" id="3_2"></td>
        <td class="rose" id="3_3"></td>
        <td class="plateau" id="3_4"></td>
        <td class="plateau" id="3_5"></td>
        <td class="plateau" id="3_6"></td>
        <td class="bleuC" id="3_7"></td>
        <td class="plateau" id="3_8"></td>
        <td class="bleuC" id="3_9"></td>
        <td class="plateau" id="3_10"></td>
        <td class="plateau" id="3_11"></td>
        <td class="plateau" id="3_12"></td>
        <td class="rose" id="3_13"></td>
        <td class="plateau" id="3_14"></td>
        <td class="plateau" id="3_15"></td>
    </tr>
    <tr>
        <td class="bleuC" id="4_1"></td>
        <td class="plateau" id="4_2"></td>
        <td class="plateau" id="4_3"></td>
        <td class="rose" id="4_4"></td>
        <td class="plateau" id="4_5"></td>
        <td class="plateau" id="4_6"></td>
        <td class="plateau" id="4_7"></td>
        <td class="bleuC" id="4_8"></td>
        <td class="plateau" id="4_9"></td>
        <td class="plateau" id="4_10"></td>
        <td class="plateau" id="4_11"></td>
        <td class="rose" id="4_12"></td>
        <td class="plateau" id="4_13"></td>
        <td class="plateau" id="4_14"></td>
        <td class="bleuC" id="4_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="5_1"></td>
        <td class="plateau" id="5_2"></td>
        <td class="plateau" id="5_3"></td>
        <td class="plateau" id="5_4"></td>
        <td class="rose" id="5_5"></td>
        <td class="plateau" id="5_6"></td>
        <td class="plateau" id="5_7"></td>
        <td class="plateau" id="5_8"></td>
        <td class="plateau" id="5_9"></td>
        <td class="plateau" id="5_10"></td>
        <td class="rose" id="5_11"></td>
        <td class="plateau" id="5_12"></td>
        <td class="plateau" id="5_13"></td>
        <td class="plateau" id="5_14"></td>
        <td class="plateau" id="5_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="6_1"></td>
        <td class="bleuF" id="6_2"></td>
        <td class="plateau" id="6_3"></td>
        <td class="plateau" id="6_4"></td>
        <td class="plateau" id="6_5"></td>
        <td class="bleuF" id="6_6"></td>
        <td class="plateau" id="6_7"></td>
        <td class="plateau" id="6_8"></td>
        <td class="plateau" id="6_9"></td>
        <td class="bleuF" id="6_10"></td>
        <td class="plateau" id="6_11"></td>
        <td class="plateau" id="6_12"></td>
        <td class="plateau" id="6_13"></td>
        <td class="bleuF" id="6_14"></td>
        <td class="plateau" id="6_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="7_1"></td>
        <td class="plateau" id="7_2"></td>
        <td class="bleuC" id="7_3"></td>
        <td class="plateau" id="7_4"></td>
        <td class="plateau" id="7_5"></td>
        <td class="plateau" id="7_6"></td>
        <td class="bleuC" id="7_7"></td>
        <td class="plateau" id="7_8"></td>
        <td class="bleuC" id="7_9"></td>
        <td class="plateau" id="7_10"></td>
        <td class="plateau" id="7_11"></td>
        <td class="plateau" id="7_12"></td>
        <td class="bleuC" id="7_13"></td>
        <td class="plateau" id="7_14"></td>
        <td class="plateau" id="7_15"></td>
    </tr>
    <tr>
        <td class="rouge" id="8_1"></td>
        <td class="plateau" id="8_2"></td>
        <td class="plateau" id="8_3"></td>
        <td class="bleuC" id="8_4"></td>
        <td class="plateau" id="8_5"></td>
        <td class="plateau" id="8_6"></td>
        <td class="plateau" id="8_7"></td>
        <td class="rose" id="8_8"></td>
        <td class="plateau" id="8_9"></td>
        <td class="plateau"id="8_10"></td>
        <td class="plateau" id="8_11"></td>
        <td class="bleuC" id="8_12"></td>
        <td class="plateau" id="8_13"></td>
        <td class="plateau" id="8_14"></td>
        <td class="rouge" id="8_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="9_1"></td>
        <td class="plateau" id="9_2"></td>
        <td class="bleuC"  id="9_3"></td>
        <td class="plateau" id="9_4"></td>
        <td class="plateau" id="9_5"></td>
        <td class="plateau" id="9_6"></td>
        <td class="bleuC" id="9_7"></td>
        <td class="plateau" id="9_8"></td>
        <td class="bleuC" id="9_9"></td>
        <td class="plateau" id="9_10"></td>
        <td class="plateau" id="9_11"></td>
        <td class="plateau" id="9_12"></td>
        <td class="bleuC" id="9_13"></td>
        <td class="plateau" id="9_14"></td>
        <td class="plateau" id="9_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="10_1"></td>
        <td class="bleuF" id="10_2"></td>
        <td class="plateau" id="10_3"></td>
        <td class="plateau" id="10_4"></td>
        <td class="plateau" id="10_5"></td>
        <td class="bleuF" id="10_6"></td>
        <td class="plateau" id="10_7"></td>
        <td class="plateau" id="10_8"></td>
        <td class="plateau" id="10_9"></td>
        <td class="bleuF" id="10_10"></td>
        <td class="plateau" id="10_11"></td>
        <td class="plateau" id="10_12"></td>
        <td class="plateau" id="10_13"></td>
        <td class="bleuF" id="10_14"></td>
        <td class="plateau" id="10_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="11_1"></td>
        <td class="plateau" id="11_2"></td>
        <td class="plateau" id="11_3"></td>
        <td class="plateau" id="11_4"></td>
        <td class="rose" id="11_5"></td>
        <td class="plateau" id="11_6"></td>
        <td class="plateau" id="11_7"></td>
        <td class="plateau" id="11_8"></td>
        <td class="plateau" id="11_9"></td>
        <td class="plateau" id="11_10"></td>
        <td class="rose" id="11_11"></td>
        <td class="plateau" id="11_12"></td>
        <td class="plateau" id="11_13"></td>
        <td class="plateau" id="11_14"></td>
        <td class="plateau" id="11_15"></td>
    </tr>
    <tr>
        <td class="bleuC" id="12_1"></td>
        <td class="plateau" id="12_2"></td>
        <td class="plateau" id="12_3"></td>
        <td class="rose" id="12_4"></td>
        <td class="plateau" id="12_5"></td>
        <td class="plateau" id="12_6"></td>
        <td class="plateau" id="12_7"></td>
        <td class="bleuC" id="12_8"></td>
        <td class="plateau" id="12_9"></td>
        <td class="plateau" id="12_10"></td>
        <td class="plateau" id="12_11"></td>
        <td class="rose" id="12_12"></td>
        <td class="plateau" id="12_13"></td>
        <td class="plateau" id="12_14"></td>
        <td class="bleuC" id="12_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="13_1"></td>
        <td class="plateau" id="13_2"></td>
        <td class="rose" id="13_3"></td>
        <td class="plateau" id="13_4"></td>
        <td class="plateau" id="13_5"></td>
        <td class="plateau" id="13_6"></td>
        <td class="bleuC" id="13_7"></td>
        <td class="plateau" id="13_8"></td>
        <td class="bleuC" id="13_9"></td>
        <td class="plateau" id="13_10"></td>
        <td class="plateau" id="13_11"></td>
        <td class="plateau" id="13_12"></td>
        <td class="rose" id="13_13"></td>
        <td class="plateau" id="13_14"></td>
        <td class="plateau" id="13_15"></td>
    </tr>
    <tr>
        <td class="plateau" id="14_1"></td>
        <td class="rose" id="14_2"></td>
        <td class="plateau" id="14_3"></td>
        <td class="plateau" id="14_4"></td>
        <td class="plateau" id="14_5"></td>
        <td class="bleuF" id="14_6"></td>
        <td class="plateau" id="14_7"></td>
        <td class="plateau" id="14_8"></td>
        <td class="plateau" id="14_9"></td>
        <td class="bleuF" id="14_10"></td>
        <td class="plateau" id="14_11"></td>
        <td class="plateau" id="14_12"></td>
        <td class="plateau"  id="14_13"></td>
        <td class="rose" id="14_14"></td>
        <td class="plateau" id="14_15"></td>
    </tr>
    <tr>
        <td class="rouge" id="15_1"></td>
        <td class="plateau" id="15_2"></td>
        <td class="plateau" id="15_3"></td>
        <td class="bleuC" id="15_4"></td>
        <td class="plateau" id="15_5"></td>
        <td class="plateau" id="15_6"></td>
        <td class="plateau" id="15_7"></td>
        <td class="rouge" id="15_8"></td>
        <td class="plateau" id="15_9"></td>
        <td class="plateau" id="15_10"></td>
        <td class="plateau" id="15_11"></td>
        <td class="bleuC" id="15_12"></td>
        <td class="plateau" id="15_13"></td>
        <td class="plateau" id="15_14"></td>
        <td class="rouge" id="15_15"></td>
    </tr>
</table>

<!-- POP UP pour HELP -->
<div id="overlayPopup-2" class="overlayPopup-2">
    <div id="Popup-2" class="Popup-2" >
        <h2> Règles du jeu </h2>
        <span id="btnClosePopup-2" class="btnClose">&times;</span>
        <div>
            <h2>
                <br>
                Le but est de poser des expressions correctes<br>
                Le chemin est considéré valide l'expression fait 0 ou 1. <br><br>
                Le 1er chemin doit obligatoirement passer par la case centrale. <br>
                Il est possible de prolonger un expression qui ne fait pas déjà 0 ou 1. <br>
                Interdit d'écrire x0 ou x1 pour gagner beaucoup de points
            </h2>
        </div>
        <button onclick="fermerPageAide()">
            <a>Compris</a>
        </button>
    </div>
</div>

<!-- POP UP pour chois nb joueurs-->
<div id="overlayPopup-3" class="overlayPopup-1" >
    <div id="Popup-3" class="Popup-1" >
        <h2> Nombre joueurs </h2>
        <div>
            <div>
                <input type="checkbox" id="Joueur1" name="ChoixNbJoueur">
                <label for="SelectJoueur"><h2>1</h2></label>
            </div>
            <div>
                <input type="checkbox" id="Joueur2" name="ChoixNbJoueur">
                <label for="SelectJoueur"><h2>2</h2></label>
            </div>
        </div>
        <button onclick="fermerPopupChoixJoueur()">
            <a>Valider</a>
        </button>
    </div>
</div>


<!-- POP UP pour règle poser jetons mod-->
<div id="overlayPopup-2" class="overlayPopup-1" >
    <div id="Popup-2" class="Popup-1" >
        <h2> Règles du jeu </h2>
        <div>
            <h2>
                <br>
                On ne peut poser les jetons dispos en bas à droite qu'après un jeton mod.
                Ils servent de base du modulo pour votre calcul on ne peut pas les poser n'importe quand.
            </h2>
        </div>
        <button onclick="fermerPopupMod()">
            <a>Compris</a>
        </button>
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
        $tScore = $sg->findAll('Modulos');
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

<script src="../Scripts/MainExposant.js"></script>
<script src="../Scripts/drag&drop.js"></script>
</body>
</html>