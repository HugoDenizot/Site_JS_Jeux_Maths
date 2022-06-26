/* EVENT LISTENER ICI */
popup = document.getElementById("Popup-1");
overlay = document.getElementById("overlayPopup-1");
boutonClose = document.getElementById("btnClosePopup-1");
    overlay2 = document.getElementById("overlayPopup-2");
    boutonCloseAide = document.getElementById("btnClosePopup-2");
popupBase1Open = document.getElementById("overlayPopup-3");
popupBase1 = document.getElementById("btnClosePopup-3");
    overlayBaseFin = document.getElementById("overlayPopup-4");
    btnClosePopupFin = document.getElementById("btnClosePopup-4");

boutonCloseAide.addEventListener("click",fermerPageAide);
boutonClose.addEventListener("click",fermerPage);
//btnClosePopupFin.addEventListener("click",fermerPopupFin);

/* Initiliadation des données ICI */
TableauxSelected = [];
TableauSelectedX = [];
TableauSelectedY = [];
validation4 = new Number(0);
validation6 = new Number(0);
base2 = new Number(0);
MIN = 2;
MAX = 5;
Difficulter = 0;
TableauxBase = [];
TableauxBaseChoisi = []
TableauxExposant = [];
// On récupère tout les td et tr avec $(" ")
nbTr = 10
nbTd = 6*10;
lengthgTd = nbTd/nbTr;
teteTr = 0;
teteTd = 0;
//fermerPopupFin();


function chargerBase() {
    checkbox = document.getElementById("divSelectBase");
    selecteur3 = document.getElementById("SelectPopup3");
    base3 = selecteur3.selectedIndex + 1;
    compteur = 0;

    for (let i = 0; i < 10; i++) {
        if (checkbox.children[i].children[0].checked) {
            base = checkbox.children[i].children[1].innerText;
            switch (base) {
                case 'A':
                    base = 11;
                    break;
                case 'B':
                    base = 13;
                    break;
            }
            compteur++;
            TableauxBaseChoisi.push(base);
        } 
    }
    if (compteur == 0) {
        alert("Veuillez choisir une ou plusieurs base pour jouer");
        return;
    } else {
        fermerPopupBase();
    }

    console.log(TableauxBaseChoisi);
    highscore1 = document.getElementById("highscore");
    highscore1.innerText = "0";

    
    

    MIN = 2;
    switch(base3){
        case 1:
            MAX = 5;
            Difficulter = 1;
            break;
        case 2:
            MAX = 10;
            Difficulter = 3;
            break;
        case 3:
            MAX = 20;
            Difficulter = 5;
            break;
        default :
            MAX = 5;
            break;
    }

    remplirTableaux(30);
}
function openPopupBase(){

    popupBase1Open.style.display = "block";
}
function fermerPopupBase(){

    popupBase1Open.style.display="none";
}
function fermerPage(){

    overlay.style.display = "none";
}
function openPopup(){

    overlay.style.display = "block";
}
function fermerPageAide(){

    overlay2.style.display = "none";
}
function openPopupAide(){

   overlay2.style.display = "block";
}
function openPopupFin(){

   overlayBaseFin.style.display = "block";
}
function fermerPopupFin(){

    overlayBaseFin.style.display = "none";
}

function highscore(){
    var d = document.getElementById("overlayPopup-5");
    d.style.display = "block";
}

function fermerhighscore(){
    var d = document.getElementById("overlayPopup-5");
    d.style.display = "none";
}

function selectItem(id,x,y){

    if(id.className === "UnSelectedItem" && id.innerText !== ""){
        if(testXYAjout(x,y)){
            // On ajoute à la fin du tableaux les valeurs.
            id.className = "SelectedItem";
            TableauxSelected.push(id)
            TableauSelectedX.push(x);
            TableauSelectedY.push(y);
            if(TableauxSelected.length > 2){
                TableauxSelected[TableauxSelected.length - 1].className = "FirstSelectedItem";
                TableauxSelected[TableauxSelected.length - 2].className = "SelectedItem";
            }
        }
    }else{
        // On supprime les valeurs si le joueur désélectionne la case.
        // pop() -> supprime dernier element du tableau , shift -> supprime premier element
        if(testXYEnleve(x,y)){
            id.className = "UnSelectedItem";
            TableauxSelected.pop();
            TableauSelectedY.pop();
            TableauSelectedX.pop();
            if(TableauxSelected.length > 2){
                TableauxSelected[TableauxSelected.length - 1].className = "FirstSelectedItem";
            }
        }
    }
}
function testXYAjout(x,y){

    if(TableauSelectedX.length === 0){
                return true;
    }else{
        // On ce déplace par rapport à la tête du chemin
        TeteX = TableauSelectedX[TableauSelectedX.length -1]
        TeteY = TableauSelectedY[TableauSelectedY.length -1]
        b1 = false;
        b2 = false;

        // Soit en haut ou en bas
        if((TeteY +1 === y && TeteX === x) || (TeteY - 1 === y && TeteX === x)){
            b1 = true;
        }

        // Soit a gauche ou a droite
        if((TeteX +1 === x && TeteY === y) || (TeteX - 1 === x && TeteY === y)){
            b2 = true;
        }

        // XOR
        // Soit a gauche/droite/en haut/en bas  mais juste 1 des déplacement et pas les deux (X et Y en meme temps)
        return  b1 && !b2  ||  !b1 && b2 ;
    }
}
function testXYEnleve(x,y){
    // test pour savoir si on peux enlever la case du tableaux ( pour eviter de couper en deux le chemin par exemple)
    // Si il n'y a que 1 élement dans le tableau
     if(TableauSelectedX.length === 1){
            return true;
     }else{
        TeteX = TableauSelectedX[TableauSelectedX.length -1]
        TeteY = TableauSelectedY[TableauSelectedY.length -1]

        return TeteY === y && TeteX === x
     }
}
function swapItem(){
    if(TableauxSelected.length != 2){
        alert("Erreur vous devez avoir 2 cases séléctionner pour faire le swap");
    }else{
        // On fait le swap ici
        tempBase = TableauxSelected[0].children[0].innerText;
        tempExpo = TableauxSelected[0].children[1].innerText;
        TableauxSelected[0].children[0].innerText = TableauxSelected[1].children[0].innerText;
        TableauxSelected[0].children[1].innerText = TableauxSelected[1].children[1].innerText;
        TableauxSelected[1].children[0].innerText = tempBase;
        TableauxSelected[1].children[1].innerText = tempExpo;

        // On vide le tableau après l'opération
        viderTableau();
        remplirTableaux(2);
    }

}
function viderTableau(){
    for (i=0 ; i < TableauxSelected.length ; i++){
        TableauxSelected[i].className = "UnSelectedItem";
    }
    TableauxSelected = [];
    TableauSelectedX = [];
    TableauSelectedY = [];
}
function recommencer(){
    /*teteTr=9;
    teteTd=0;
    highscore=0;
    highscore1 = document.getElementById("highscore");
    highscore1.innerHTML = highscore;
    j=1000;
    for(y=1;y<11;y++){
        h=j;
        for(i=0;i<6;i++){
            h=h+1;
            console.log(h);
            document.getElementById(h).innerHTML=" ";
            sup=h+"sup";
            //console.log(sup);
            document.getElementById(sup).innerHTML=" ";
        }
        j=j+1000;
    }*/
    window.location.reload();
}
function genererNombre(){
      var B = getRandomInt(TableauxBaseChoisi.length);
      var Base = TableauxBaseChoisi[B];
      Base = BaseToChiffre(Base);
      TableauxBase.push(Base);

      var alea2 = Math.random();
      if(alea2 < 0.15){
        alea = Math.random();
        if(alea > 0.5){
            E = 1;
        }else{
            E = 0;
        }
      }else{
         var alea = Math.random();
         var E = getRandomArbitrary(MIN,MAX);
         if(alea > 0.5){
            E = -E;
         }
      }
      TableauxExposant.push(E);
}
function getRandomArbitrary(min, max) {

		 return Math.floor(Math.random() * (max - min + 1)) + min;
}
function getRandomInt(max) {

  return Math.floor(Math.random() * max);
}
function lierTableauCase(id){
     // On genere le nombre dans nos tableaux
     genererNombre();
     if(TableauxBase.length === 0 || TableauxExposant.length === 0){
         alert("Erreur Interne 'Tableaux vide' (lierTableauxCase) ");
         return ;
     }else{
         if(id.innerHTML === ""){
             alert("Erreur Interne 2 'Case déja utilisé' (lierTableauxCase) ");
             return;
         }else{

             // On ajoute nos nombres dans les cases du tableaux HTML
            id.children[0].innerHTML = TableauxBase[TableauxBase.length - 1];
            id.children[1].innerText = TableauxExposant[TableauxExposant.length - 1];
              
           
            // On supprime le nombre pour éviter la redondance
            TableauxBase.pop();
            TableauxExposant.pop();
         }
     }
}
function remplirTableaux(nombreElement){
    Table = document.getElementById("TableauJeu");
    // On vérifie d'abord si la partie est terminé avant de rajouter quelque chose. 
     partieFini();


    for (i = 0; i < nombreElement; i++){
        // On regarde si la case est bien vide pour inserer quelque chose dedans.
        if(Table.children[0].children[teteTr].children[teteTd].innerHTML != ""){
            lierTableauCase(Table.children[0].children[teteTr].children[teteTd]);
        }
        // On incrémente la tête de lecture. 
        teteTd++;
        if(teteTd >= lengthgTd){
            teteTd = 0; 
            // Il faut bien faire descendre la ligne qui viens de se crée 
            //sinon une autre ligne va ce superposée dessus. 
            descendreTableaux();

        }
    }
    descendreTableaux();
}
function valider(){
    if(TableauxSelected.length == 0){
        console.log("aucune case selectionnée reessayer")
        return;
    }else{
        resultat=1;
        for(i=0; i<TableauxSelected.length; i++){
            if(TableauxSelected[i].children[0].innerHTML==="A"){
                base=new Number(11);
            }else if(TableauxSelected[i].children[0].innerHTML==="B"){
                base=new Number(13);
            }else{
                base=new Number(TableauxSelected[i].children[0].innerHTML);
            }
            expo=new Number(TableauxSelected[i].children[1].innerHTML);
            resultat=resultat*Math.pow(base,expo);
        }
    }
    console.log(resultat);
    if(resultat > 0.9993&&resultat<1.0003){
        console.log("chemin valide");
        for (i=0 ; i < TableauxSelected.length ; i++){
            TableauxSelected[i].children[0].innerHTML = null;
            TableauxSelected[i].children[1].innerHTML = null;
        }
        gestionScore(getScore());
    }else{
        gestionScore(-50)
        console.log("chemin invalide");
    }

    remplirTableaux(2);
    viderTableau();
    partieFini();

    validation6 = 0;
    validation4 = 0;
    //suppCheminValide();
}
function descendreTableaux(){
    for(i2=0;i2<lengthgTd;i2++){
        descendreColonne(i2);
    }
}
function descendreColonne(x){
    // On récupère le tableau du jeu
    table = document.getElementById("TableauJeu");

    // On parcours toute les lignes du tableau
    for(i3=nbTr-1;i3>=0;i3--){
        // On regarde si il y a une case vide dans chaque colonne
        if(table.children[0].children[i3].children[x].children[0].innerText === ""){
            /*
             Si on trouve une case vide dans un colonne alors
             on  parcours le reste de la colonne pour chercher une case qui n'est pas vide
             Pour la faire descendre à la place de la case vide
             */
            for(j=i3;j>=0;j--){
                if(table.children[0].children[j].children[x].innerText !== ""){
                    table.children[0].children[i3].children[x].children[0].innerHTML = table.children[0].children[j].children[x].children[0].innerHTML;
                    table.children[0].children[i3].children[x].children[1].innerHTML = table.children[0].children[j].children[x].children[1].innerHTML;

                    table.children[0].children[j].children[x].children[0].innerHTML = "";
                    table.children[0].children[j].children[x].children[1].innerHTML = "";
                    descendreTableaux();

                }
            }
        }
    }
}
function changementBase(){

    if (TableauxSelected.length !== 1) {

        return;
    }
    selecteur = document.getElementById("SelectPopup");
    choix = selecteur.selectedIndex;
    if (choix >= 8) {
        if (choix == 8) {
            choix = "A";
        } else {
            choix = "B";
        }
    } else {
        choix = choix + 2; // On rajoute 2 car enfaite ici on chope l'index et non la valeur du nombre séléctionner
    }
    TableauxSelected[0].children[0].innerText = choix;
    remplirTableaux(4);
    viderTableau();
    fermerPage();
}
function changementExpo(){
    if(TableauxSelected.length !== 1){
        return;
    }
    expo=parseInt(TableauxSelected[0].children[1].innerText,10);
    TableauxSelected[0].children[1].innerText = -expo;
    remplirTableaux(2);
    viderTableau();
    fermerPage();
}
function gestionScore(score){
    highscore = 0;
    highscore1 = document.getElementById("highscore");
    console.log(parseFloat(highscore1.innerText,10));
    highscore = parseInt(highscore1.innerText,10) + score;
    highscore1.innerHTML = highscore;
}
function getScore(){
    ActualScore = 0
    ActualScore = TableauxSelected.length * (0.25 * TableauxSelected.length) * 30 + 30 + 35 * Difficulter;
    ActualScore = parseInt(ActualScore);
    formeSpe = formeSpecial()
    if(formeSpe !== 0){
        ActualScore = ActualScore + formeSpe;
        return ActualScore;
    }else{
        return ActualScore
    }
}
function formeSpecial(){
    if(TableauSelectedX.includes('1') && TableauSelectedX.includes('6')){
        return 50;
    }
    return 0;
}
function fin(){
    document.location.reload();
}
function partieFini(){
    table = document.getElementById("TableauJeu");
    for(i=0;i<6;i++){
        /*
            Si on trouve une case remplis dans la dernière ligne de notre tableau alors le jeux est terminé.
        */
        if(table.children[0].children[0].children[i].innerText !== ""){
            /*
                On lance alors le pop-up de score final pour terminer la partie.
            */
            let input = document.querySelector('a[name="score"]');
            let i = document.querySelector('input[name="Score"]');
            let highscore1 = document.getElementById("highscore");
            //console.log("valeur score : "+input.innerHTML);
            input.innerHTML = highscore1.innerHTML
            i.value = highscore1.innerHTML
            console.log("score : "+i.value);
            openPopupFin();
        }
    }
}
function BaseToChiffre(base) {
    switch (base) {
        case 11:
            return 'A';
        case 13:
            return 'B';
        default:
            return base;
    }
}




