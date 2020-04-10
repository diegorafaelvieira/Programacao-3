function calcular() {
    var consumoEtanol = document.getElementById("consEta").innerHTML.value;
    var consumoGas = document.getElementById("consGas").innerHTML.value;

    var pE = document.getElementById("vE").innerHTML.value;
    var pG = document.getElementById("vG").innerHTML.value;
    
    //Calculo média
    var mE = consumoEtanol/pE;
    var mG = consumoGas/pG;

    //Verificação
    if(mE == mg) {
        document.getElementById("res").innerHTML = "Indiferente";
    } if (mE > mg) {
        document.getElementById("res").innerHTML = "Etanol melhor que gasolina";
    } else {
        document.getElementById("res").innerHTML = "Gasolina melhor que etanol";
    }


}