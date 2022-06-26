<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/Commun.css">
    <link rel="stylesheet" type="text/css" href="../css/HighScore.css">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Exo+2|Fjalla+One|Slabo+27px|Staatliches&display=swap" rel="stylesheet">
    <title>Highscore</title>

</head>
<body>

<div class="highScore">
    <?php
    if($tScore != null){
        foreach ($tScore as $rows){
            echo '<p>'.$rows->getPseudo().' : '.$rows->getVal().'</p>';
        }
    }else{
        echo'<a value="vide">Pas de highscore</a>';
    }

    ?>
</div>

<div class="divTitre">
    <h1 class="titre">High</h1>
    <h1 class="titre">Score</h1>
</div>

<div class="menu">
    <div>
        <h1 class="titre2" href="#" role="button">Exposants</h1>
        <a class="titre3" href="../html/JeuExposant.php">Jeu<br/></a>
        <a class="titre3" href="../html/CoursExposants.html">Cours</a>
    </div>

    <div>
        <h1 class="titre2" href="#" role="button">Modulos</h1>
        <a class="titre3" href="../html/JeuModulo.php">Jeu<br/></a>
        <a class="titre3" href="../html/CoursModulo.html">Cours</a>
    </div>

    <footer>
        <a href="../html/Accueil.html">Accueil</a>
    </footer>
</div>

<!--<form method="post" action="../PHP/index.php?action=insererScore">
    <input type="hidden" value="Exposants" name="type"/>
    Pseudo : <input name="Pseudo" type="text" />
    Score : <input name="Score" type="text" />
    <button type="submit">Test ajout highscore</button>
</form>-->

</body>
</html>
