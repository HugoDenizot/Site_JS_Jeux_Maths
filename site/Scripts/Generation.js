MIN = 2;
MAX = 10;

TableauxBase = [1,2,3];
TableauxExposant = [4,5,6];
TableauxBaseChoisi = [2,3,4,5];

function genererNombre(){
      B = getRandomInt(TableauxBaseChoisi.lenght);
      Base = TableauxBaseChoisi[B];
      TableauxBase.push(Base);

      E = getRandomArbitrary(MIN,MAX);
      TableauxExposant.push(E);
}

function getRandomArbitrary(min, max) {
		return Math.random() * (max - min) + min;
}

function lierTableauCase(id){

     id.innerHTML = TableauxBase[0]
     var idsup = document.getElementByID("1001sup");

     if(idsup === null){
        alert("Erreur idsup introuvable");
     }
     idsup.innerHTML = TableauxExposant[0];

    /*
    // On genere le nombre dans nos tableaux
    genererNombre();
    if(TableauxBase.length === 0 || TableauxExposant.length === 0){
        alert("Erreur Interne 'Tableaux vide' (lierTableauxCase) ");
        return ;
    }else{
        if(id.innerHTML != null){
            alert("Erreur Interne 2 'Case déja utilisé' (lierTableauxCase) ");
            return;
        }else{


            // On ajoute nos nombres dans les cases du tableaux HTML
            id.innerHTML = TableauxBase[0]
            var idsup = document.getElementById(id.concat("sup"));
            idsup.innerHTML = TableauxExposant[0];

            // On supprime le nombre pour éviter la redondance
            TableauxBase.pop();
            TableauxExposant.pop();
        }
    }
    */
}

function remplirTableaux(nombreElement){

    depart = 10001;
    for(i=0 ;i<nombreElement; i++){
        // Si le tableaux est plein alors boucle infinie => condition de sortie ici
        if(depart <= 1000){
            alert("Erreur interne 'Boucle Infinie'  (remplirTableaux)");
            return;
        }
        Bloc = getElementById(depart);
        if(Bloc === null){
            // Si on déborde du tableaux il faut allez à la case suivante qui ce trouve au dessus
            depart = depart - 1006;
        }else{
            // Si la case existe mais n'est pas disponible
            if(Bloc.innerHTML != null){
                depart ++;
            }else{
                // On lie à une case qui est vide une valeur de nos tableaux
                lierTableauCase(getElementById(depart));
                i++;
                depart ++;
            }
        }
    }
}

