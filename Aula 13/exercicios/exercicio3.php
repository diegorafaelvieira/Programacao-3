<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">

    <title>Exercicio 3</title>
</head>
<body>
    <form action="exercicio3.php" method="GET">
        NOME:<br/>
        <input type="text" name="nome"><br/><br/>
        SOBRENOME:<br/>
        <input type="text" name="sobrenome"><br/><br/>
        IDADE:<br/>
        <input type="number" name="idade" min=0><br/>
        <input type="submit" value="Enviar">
    </form>

    <?php

       if((!empty($_GET['nome'])) || (!empty($_GET['sobrenome'])) 
       || (!empty($_GET['idade']))) {
        $nome = $_GET['nome'];
        $sobrenome = $_GET['sobrenome'];
        $idade = $_GET['idade'];
        $nomes = [];
        $sobrenomes = [];
        $totIdade = 0;

        foreach ($nomes as $key => $nome) {
            array_push($nomes, $nome);
            echo "$key".", ";    
        }
        echo "<br/>";
        foreach ($sobrenomes as $key => $sobrenome) {
            array_push($sobrenomes, $sobrenome);
            echo "$key".", ";    
        }
        echo "<br/>";
        foreach ($totIdade as $key => $idade) {
            $totIdade += $idade;
            echo "Total das idades é: ".$totIdade; 
        }
    
       } else {
           echo "Preencha todos os campos!";
       }
    ?>
    
</body>
</html>