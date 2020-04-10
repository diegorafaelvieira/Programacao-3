<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    
    <title>Exercicio 3</title>
</head>
<body>
    
    <form action="exercicio3.php" method="GET">
        Informe um número:
        <input type="number" name="numero" min=0><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
           
        if(!empty($_GET['numero'])) {
         
            $numero = $_GET['numero'];
          
            function primo($num) {
            $numDiv = 0;
            for($i=1; $i <= $num; $i++) {
                if($num % $i == 0) {
                    echo "$num é divisível por $i"."<br>";
                    $numDiv++;
                } 
            }

            if($numDiv == 2) {
                echo "É PRIMO";
            } else {
                echo "NÃO É PRIMO";
                }

            }

            primo($numero);
                  
        } else {
            echo "Informe um número positivo!";
        }

    ?>

</body>
</html>