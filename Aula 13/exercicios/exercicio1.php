<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
   
    <title>Exercicio 1</title>
</head>
<body>
    <form action="exercicio1.php" method="GET">
    Informe o tamanho do array: <br/>
    <input type="number" name="tamanho" min=0><br/><br/>
    Informe uma palavra: <br/>
    <input type="text" name="palavra"><br/><br/>
    <input type="submit" value="Enviar"><br/>

    <?php
        if((!empty($_GET['tamanho'])) || (!empty($_GET['palavra']))) {
            $tamanho = $_GET['tamanho'];
            $palavra = $_GET['palavra'];

            $lista = [];
            for($i=0; $i < $tamanho; $i++) {
                array_push($lista, $palavra);
            }

            function gerarArray($lista) {
                $tamanho = $_GET['tamanho'];
                for($j = 0; $j < $tamanho; $j++) {
                    echo $lista[$j].", ";
                }
            }

            gerarArray($lista);

        } else {
            echo "Preencha todos os campos!";
        }
    ?>
</body>
</html>