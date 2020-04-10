// A ordernar array
var array = [1,5,10,20,100];
var menor = 1000;
function ordenar(array) {
    for(i = 1; i <= array.length; i++) {
        if (i < menor) {
            menor = i;
        }
        document.getElementById("res").innerHTML = (menor + ",");

    }
}


//B funcao construtora
var imovel = new Object();
imovel.rua = "Avenida Brasil";
imovel.numero = 30;
imovel.cidade = "Feliz";

console.log("O imóvel na "+imovel.rua+" de número "+imovel.numero+" pertence a cidade de "+imovel.cidade);

function imprimir(x) {
    for (i in x) {
        console.log(x[i]);
    }
}

imprimir(imovel);
