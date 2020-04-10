<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    
    <title>Exercicio 4</title>
</head>
<body>
    
    <form action="exercicio4.php" method="GET">
        Informe um valor:
        <input type="number" name=valor min=0><br>
        <input type="submit" value="Enviar">        
    </form>
    <p><a href="exercicio4b.php">Clique aqui para testar</a></p>

    <?php
        if(!empty($_GET['valor'])) {

            $valor = $_GET['valor'];
            setcookie("val", $valor, time()+10);
        } else {
            echo "Informe um número positivo!";
        }
    ?>
</body>
</html>