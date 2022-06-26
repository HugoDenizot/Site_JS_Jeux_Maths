let mot= Number(1)
let lettre = Number(1)


function poserJeton(id){
    val = getValeur(id);
    console.log("valeur : "+val);
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































