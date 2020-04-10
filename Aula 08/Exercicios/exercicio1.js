/*
 1.Construa funções JavaScript para executar as seguintes tarefas:
 (crie uma função para cada item abaixo)
   a)Calcular a média dos valores em um array de números.
  Considere que o array deve ser informado como um parâmetro da função e a média calculada deve
ser retornada pela função.
 */

    function mediaArray(lista) {
        var listaMedia = [];
        listaMedia = lista;
        var somaArray = 0;
        var mediaArray = 0;
        for (let indice = 0; indice < listaMedia.length; indice++) {
            somaArray += listaMedia[indice];
            
        }

        mediaArray = somaArray / listaMedia.length;
        //console.log(mediaArray);
        document.getElementById("lista").innerHTML = "A média do array é "+mediaArray;
    }

    /* 
    b)Calcular a menor diferença entre quaisquer valores em um array de números. 
    Considere que o array deve ser informado como um parâmetro da função e a menor diferença calculada
    deve ser retornada pela função.Por exemplo, no array [-10,10,15,35,70,100] a menor diferença é 5,
    resultado de 15 – 10.
    */

    function menorDiferenca(lista2) {
        var array = [-10,10,15,35,70,100];
        var diferenca;
        var res = 100;
        
        for(i = 0; i < array.length; i++) {
            
            for (j = 0; j < array.length[i]; j++) {
                diferenca = array[i] - array[i-1];
            }
           
        }

        console.log(diferenca);

    }





