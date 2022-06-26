var pioche=[0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,"x1","x2","y1","y2","z1","z2"];
var p1 = document.getElementById("jetonj1");
var p2 = document.getElementById("jetonj2");
var op = document.getElementById("jeton2");
var chiffres = document.getElementById("jeton3");
var parent;
var joueur=1;
var nbJoueurs = Number(0)
var i = Number(28);
var precedent;
var popupMilieu = document.getElementById("overlayPopup-1");
var popuoMod = document.getElementById("overlayPopup-2");
var cpt1 = Number(0);
var cpt2 = Number(0);
var TableauSelectedX = [];
var TableauSelectedY = [];
var OrientationChemin; // 0 Chemin vertical , 1 Chemin Horizontale
let mot= Number(1)
let lettre = Number(1)

var popupJ1 = document.getElementById("overlayPopup-7")
var popupJ2 = document.getElementById("overlayPopup-8")
var scorej2 = document.getElementById("overlayPopup-6")

function onDragStart(event) {

    event.dataTransfer.setData('text/plain', event.target.id);
    parent = event.target.parentNode.id;


    event.currentTarget.style.backgroundColor = 'backgroundColor';
}

function onDragOver(event) {
    event.preventDefault();
}

function onDrop(event) {
    event.preventDefault();
    const id1 = event.dataTransfer.getData('text');
    const draggableElement = document.getElementById(id1);
    const dropzone = event.target;




    //vérification un seul fils dans le tableau
    if(dropzone.hasChildNodes()){
        console.log("erreur");
        return;
    }

    //X => ligne et Y => colonnes
    var y = dropzone.id.split("_")[0];
    var x = dropzone.id.split("_")[1];
    var Y = parseInt(y);
    var X = parseInt(x);
    if (testXYAjout(X, Y)) {
        TableauSelectedX.push(X);
        TableauSelectedY.push(Y);
        if (TableauSelectedX.length === 2) {
            if (TableauSelectedX[0] === TableauSelectedX[1])
                OrientationChemin = 0;
            else if (TableauSelectedY[0] === TableauSelectedY[1])
                OrientationChemin = 1;
            else
                console.log("ERREUR SYSTEM : ERREUR DANS LE CHEMIN , IMPOSSIBLE DE DEFINIR L ORIENTATION");
        }
       
    } else {
        console.log("ERREUR DROP DANS MAUVAISE ZONE");
        return;
    }
    
    dropzone.appendChild(draggableElement);
    var val = draggableElement.innerHTML;
    derniereCase=dropzone.id;

    var td1 = dropzone.childNodes[0];
    td1.setAttribute("draggable", false);


    if(parent === op.id){
        remettreOperation(val);
    }else{
        if(parent === chiffres.id){
            remettreJeton(val);
        }
    }
    if(parent === p1.id){
        cpt1 +=1;
    }
    if(parent === p2.id){
        cpt2 +=1;
    }
    event.dataTransfer.clearData();
}

function testXYAjout(X, Y) {

    var teteX = TableauSelectedX[TableauSelectedX.length - 1]
    var teteY = TableauSelectedY[TableauSelectedY.length - 1]
    var TeteX = parseInt(teteX);
    var TeteY = parseInt(teteY);
    b1 = false;
    b2 = false;

    if (TableauSelectedX.length === 0) {
        return true;

    } else if(TableauSelectedX.length === 1){
        // Soit en haut ou en bas
        if ((TeteY + 1 === Y && TeteX === X) || (TeteY - 1 === Y && TeteX === X)) {
            b1 = true;
        }

        // Soit a gauche ou a droite
        if ((TeteX + 1 === X && TeteY === Y) || (TeteX - 1 === X && TeteY === Y)) {
            b2 = true;
        }

        
        // XOR
        // Soit a gauche/droite/en haut/en bas  mais juste 1 des déplacement et pas les deux (X et Y en meme temps)
        return b1 && !b2 || !b1 && b2;
    }else {

        if ((TeteY + 1 === Y && OrientationChemin === 0) || (TeteY - 1 === Y && OrientationChemin === 0)) {
            b1 = true;
        }

        if ((TeteX + 1 === X && OrientationChemin === 1) || (TeteX - 1 === X && OrientationChemin === 1)) {
            b2 = true;
        }

        return b1 && !b2 || !b1 && b2;
    }
}

function getRandomInt(max) {
    //retourne un entier aléatoire entre 0 et max
    return Math.floor(Math.random() * Math.floor(max));
}

function gestionPioche(){
    var n = new Number(0);
    var nombre;
    let max = new Number(pioche.length-1);
    n = getRandomInt(max);
    //on récupère dans nombre la valeur au rang n de la pioche
    nombre = pioche[n];
    //on supprime de la pioche la valeur récupérée
    pioche.splice(n,1);
    return nombre;
}

function ajouterJeton(v){
    if(joueur === 1){
        while (cpt1 !== 0){
            // on crée une balise td
            var td = document.createElement("td");
            //on set la valaur de td via gestionPioche
            td.innerHTML = gestionPioche();
            //on définis les méthodes et paramètre du td
            td.draggable = "true";
            td.ondragstart = function(){ onDragStart(event);}
            td.className = "draggable";
            i = i+1;
            td.id = "draggable-"+i;
            //on ajoute la balise au parent duquel on viens de prendre un jeton
            v.appendChild(td);
            cpt1 -=1;
        }
    }else{
        while (cpt2 !== 0){
            // on crée une balise td
            var td = document.createElement("td");
            //on set la valaur de td via gestionPioche
            td.innerHTML = gestionPioche();
            //on définis les méthodes et paramètre du td
            td.draggable = "true";
            td.ondragstart = function(){ onDragStart(event);}
            td.className = "draggable";
            i = i+1;
            td.id = "draggable-"+i;
            //on ajoute la balise au parent duquel on viens de prendre un jeton
            v.appendChild(td);
            cpt2 -=1;
        }
    }

}

function remettreJeton(val){
    //on crée et remplie une balise td avec la valeur déposée avant
    var td = document.createElement("td");
    td.innerHTML = ""+val;
    td.draggable = "true";
    td.ondragstart = function(){ onDragStart(event);}
    td.className = "draggable";
    i = i+1;
    td.id = "draggable-"+i;
    //on ajoute la balise crée à son parent
    chiffres.appendChild(td);
}

function remettreOperation(val){
    //on crée et remplie une balise td avec la valeur déposée avant
    var td = document.createElement("td");
    td.innerHTML = ""+val;
    td.draggable = "true";
    td.ondragstart = function(){ onDragStart(event);}
    td.className = "draggable";
    i = i+1;
    td.id = "draggable-"+i;
    //on ajoute la balise crée à son parent
    op.appendChild(td);
}

function openPopupErreurMilieu(){
    popupMilieu.style.display = "block";
}
function fermerPopupMilieu(){
    popupMilieu.style.display = "none";
    window.location.reload();
}

function openPopupMod(){
    popuoMod.style.display = "block";
}

function fermerPopupMod(){
    popuoMod.style.display = "none";
}

function valider(){
    tabHorizontal=[];
    tabVertical=[];
    var mod = "";
    var regex = /[1-9]]/;
    //vérifier si la case de dépot est bonne -> à faire
    var milieu = document.getElementById("8_8");
    if(!milieu.hasChildNodes()){
        openPopupErreurMilieu();
    }
    caseTableau=document.getElementById(derniereCase);

    //console.log(caseTableau.childNodes[0].innerHTML);
    validationHorizontale(derniereCase);
    validationVerticale(derniereCase);
    if(!(((tabHorizontal[0]==='+'||tabHorizontal[0]==='-'||tabHorizontal[0]==='x'||tabHorizontal[0]==='/'))||((tabHorizontal[tabHorizontal.length-1]==='+'||tabHorizontal[tabHorizontal.length-1]==='-'||tabHorizontal[tabHorizontal.length-1]==='x'||tabHorizontal[tabHorizontal.length-1]==='/'||tabHorizontal[tabHorizontal.length-1]==='mod'||tabHorizontal[0].match(regex)||tabHorizontal[0]===")")))){
        resultatHorizontal();
    }
    if(!(((tabVertical[0]==='+'||tabVertical[0]==='-'||tabVertical[0]==='x'||tabVertical[0]==='/'))||((tabVertical[tabVertical.length-1]==='+'||tabVertical[tabVertical.length-1]==='-'||tabVertical[tabVertical.length-1]==='x'||tabVertical[tabVertical.length-1]==='/'||tabVertical[tabVertical.length-1]==='mod'||tabVertical[0].match(regex)||tabVertical[0]===")")))) {
        resultatVertical();
    }
    TableauSelectedX=[];
    TableauSelectedY=[];

    if(nbJoueurs === 2){
        console.log("blabla");
       if(joueur === 1){
           ajouterJeton(p1);
       }else{
           ajouterJeton(p2)
       }
    }else{
        console.log("blabla2");
        ajouterJeton(p1);
    }
    //ajouterJeton(p1)
    if(nbJoueurs === 2){
        if(joueur===1){
            joueur=2;
            popupJ1.style.display = "none"
            popupJ2.style.display = "block"
        }else{
            joueur=1;
            popupJ2.style.display = "none"
            popupJ1.style.display = "block"
        }
    }


}

function resultatHorizontal(){
    var score=0;
    var evalHorizontal="";
    var regex = /[1-9]]/;
    var val = 0
    for(i=0;i<tabHorizontal.length;i++){
        if(tabHorizontal[i]==="x"){

            evalHorizontal=evalHorizontal+" '"+"*"+"' +";
            score=score+4;
        }else if(tabHorizontal[i].match(regex)) {
            regex = /[1-9]/;
            tabHorizontal[i] = tabHorizontal[i].match(regex)[0];
            //console.log("oui hugo "+tabVertical[i])
            evalHorizontal = evalHorizontal + " '" + "% "+tabHorizontal[i]+ "' +";
            score=score+6;
        }else {
            if(tabHorizontal[i]==="+"||tabHorizontal[i]==="-"){
                score=score+2;
            }else if(tabHorizontal[i]==="("||tabHorizontal[i]===")"){
                score=score+0;
            }else{
                score=score+1;
            }
            evalHorizontal = evalHorizontal + " '" + String(tabHorizontal[i]) + "' +";
        }
    }
    if(tabHorizontal.length === 1){
        score = 0
    }
    evalHorizontal=evalHorizontal.substring(0, evalHorizontal.length - 1);
    var horizontalEvalue=eval(evalHorizontal);
    console.log("résultat horizontal: "+eval(horizontalEvalue));
    if(eval(horizontalEvalue)===1){
          score=score+50;
    }
    gestionScore(score);
}

function resultatVertical(){
    var score=0;
    var evalVerticale = "";
    var regex = /[1-9]]/;
    for (i = 0; i < tabVertical.length; i++) {
        if(tabVertical[i]==="x"){
            score=score+4;
            evalVerticale = evalVerticale + " '" + "*" + "' +";
        }else if(tabVertical[i].match(regex)) {
            regex = /[1-9]/;
            tabVertical[i] = tabVertical[i].match(regex)[0];
            //console.log("oui hugo "+tabVertical[i])
            evalVerticale = evalVerticale + " '" + "% "+tabVertical[i]+ "' +";
            score=score+6;
            console.log(evalVerticale);
        }else {
            if(tabVertical[i]==="+"||tabVertical[i]==="-"){
                score=score+2;
            }else if(tabVertical[i]==="("||tabVertical[i]===")"){
                score=score+0;
            }else{
                score=score+1;
            }
            evalVerticale = evalVerticale + " '" + String(tabVertical[i]) + "' +";
        }
    }
    if(tabVertical.length == 1){
        score = 0
    }
    evalVerticale = evalVerticale.substring(0, evalVerticale.length - 1);
    var verticalEvalue = eval(evalVerticale);
    console.log("résultat vertical: " + eval(verticalEvalue));
    if(eval(verticalEvalue)===1){
        score=score+50;
    }
    gestionScore(score);
}

function validationHorizontale(id){
    //console.log(id);
    var caseTableau=document.getElementById(id);
    /*var regex = /[1-9]]/;
    if(caseTableau.childNodes[0].innerHTML.match(regex)){
        mod = caseTableau.childNodes[0].innerHTML.match(regex)
        console.log("oui42 " + mod);
        regex = /[1-9]/
        mod = caseTableau.childNodes[0].innerHTML.match(regex)[0];
        console.log("oui42 " + mod);
        caseTableau.childNodes[0].innerHTML = mod;
    }*/
    while(caseTableau.hasChildNodes()) {
        var X = id.split("_")[0];
        var Y = id.split("_")[1];
        if (Y !== 1) {
            Y=Y-1;
            id = X + "_" + Y;
            caseTableau = document.getElementById(id);
        } else {
            break;
        }
    }
    Y=Y+1;
    id=X+"_"+Y;
    caseTableau = document.getElementById(id);
    while(caseTableau.hasChildNodes()){
            tabHorizontal.push(caseTableau.childNodes[0].innerHTML);
            X = id.split("_")[0];
            Y = id.split("_")[1];
            if(Y !=15){
            y=Number(Y);
            y=y+1;
            id = X + "_" + y;
            caseTableau = document.getElementById(id);
            }else{
                break
            }
    }
    //console.log("Tableau horizontal: "+tabHorizontal);
    return;
}

function validationVerticale(id){
    caseTableau=document.getElementById(id);
    /*var regex = /[1-9]]/;
    if(caseTableau.childNodes[0].innerHTML.match(regex)){
        mod = caseTableau.childNodes[0].innerHTML.match(regex)
        console.log("oui42 " + mod);
        regex = /[1-9]/
        mod = caseTableau.childNodes[0].innerHTML.match(regex)[0];
        console.log("oui42 " + mod);
        caseTableau.childNodes[0].innerHTML = mod;
    }*/
    while(caseTableau.hasChildNodes()){
        var X = id.split("_")[0];
        var Y = id.split("_")[1];
        if(X!==1){
            X=X-1;
            id=X+"_"+Y;
            caseTableau=document.getElementById(id);
        }else{
            break;
        }
    }
    X=X+1;
    id=X+"_"+Y;
    caseTableau = document.getElementById(id);
    while(caseTableau.hasChildNodes()){
            tabVertical.push(caseTableau.childNodes[0].innerHTML);
            var X = id.split("_")[0];
            var Y = id.split("_")[1];
            if(X!==15){
                x=new Number(X);
                x=x+1;
                id = x+ "_" + Y;
                caseTableau=document.getElementById(id);
            }else{
                break;
            }
    }
    //console.log("Tableau vertical: "+tabVertical);
    return;
}

function ouvrirPage(){
    var p = document.getElementById("overlayPopup-4");
    p.style.display = "none";
    //à l'ouverture de la page, on définit aléatoirement la pioche du joueur et on regarde le nombre de joueurs
    var p = document.getElementById("overlayPopup-3");
    p.style.display = "block"
    popupJ1.style.display = "none"
    popupJ2.style.display = "none"
    scorej2.style.display = "none"

    for(var i=1; i<8; i++){
        var val = document.getElementById("draggable-"+i);
        val.innerHTML = gestionPioche();
    }
}

function fermerPopupChoixJoueur(){
    var j1 = document.querySelector("#Joueur1");
    var j2 = document.querySelector("#Joueur2");
    if(j1.checked){
        nbJoueurs = 1
        scorej2.style.display = "none"
    }else{
        if(j2.checked){
            nbJoueurs = 2
            for(var i=22; i<29; i++){
                var val = document.getElementById("draggable-"+i);
                val.innerHTML = gestionPioche();
            }
            scorej2.style.display = "block";
        }
    }
    if (nbJoueurs === 0) {
        alert("Choisissez le nombre de joueurs svp!");
        return;
    }else{
        var p = document.getElementById("overlayPopup-3");
        p.style.display = "none"
    }
    popupJ1.style.display = "block"
    console.log("nb joueurs : "+nbJoueurs);
}

function highscore(){
    var d = document.getElementById("overlayPopup-5");
    d.style.display = "block";
}

function fermerhighscore(){
    var d = document.getElementById("overlayPopup-5");
    d.style.display = "none";
}

function recommencer(){
    location.reload();
}

function getValeur(id){
    if(id.className === "rouge"){
        //mot compte triple
        mot += 3;
    }
    if(id.className === "rose"){
        //mot compte double
        mot += 2;
    }
    if(id.className === "bleuF"){
        //lettre compte triple
        lettre = 3;
    }
    if(id.className === "bleuC"){
        //lettre compte double
        lettre = 2;
    }
}

function gestionScore(score){
    if(joueur === 1){
        highscore1 = document.getElementById("highscore1");
        var ancienneValeur = Number(highscore1.innerHTML);
        var nouvelleValeur = Number(score+ancienneValeur);
        highscore1.innerHTML = nouvelleValeur;
    }else{
        highscore1 = document.getElementById("highscore2");
        var ancienneValeur = Number(highscore1.innerHTML);
        var nouvelleValeur = Number(score+ancienneValeur);
        highscore1.innerHTML = nouvelleValeur;
    }

}

function finPartie(){
    let input1 = document.querySelector('a[name="scorej1"]');
    let i1 = document.querySelector('input[name="Score1"]');
    let highscore1 = document.getElementById("highscore1");
    //console.log("valeur score : "+input.innerHTML);
    input1.innerHTML = highscore1.innerHTML
    i1.value = highscore1.innerHTML
    console.log("score : "+i.value);

    let input2 = document.querySelector('a[name="scorej2"]');
    let i2 = document.querySelector('input[name="Score2"]');
    let highscore2 = document.getElementById("highscore2");
    //console.log("valeur score : "+input.innerHTML);
    input2.innerHTML = highscore2.innerHTML
    i2.value = highscore2.innerHTML
    console.log("score : "+i.value);

    var p = document.getElementById("overlayPopup-4");
    p.style.display = "block";
}
