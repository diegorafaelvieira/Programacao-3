function alterarArray(lista) {
    console.log(lista);
    let array1 = [];

    for (let index = 0; index < lista.length; index++) {

        switch (lista[index]) {
            case 1:
                array1[index] = "Um";
                break;
            case 2:
                array1[index] = "Dois";
                break;
            case 3:
                array1[index] = "Três";
                break;
            case 4:
                array1[index] = "Quatro";
                break;
            case 5:
                array1[index] = "Cinco";
                break;
            default:
                array1[index] = "Outro";
                break;
        }
    }
    return console.log(array1);
}





function divisivel(n,d) {
    if (n > 0) {
        for (let n = 0; n <= n; n++) {
            if (n % d == 0) {
                console.log(n + " é divisível por " + d);
            }
        }
    }
}