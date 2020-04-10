<form action="exercicio2.php" method="get">
    Número 1:
    <input type="number" name="numero1"><br>
    Número 2:
    <input type="number" name="numero2"> <br>
    <input type="submit" value="Enviar">
</form>

<?php

    if ((!empty($_GET['numero1'])) || (!empty($_GET['numero2']))) {
        
        $numero1 = $_GET['numero1'];
        $numero2 = $_GET['numero2'];

        if ($numero1 > $numero2) {
            for ($i=$numero2; $i < $numero1; $i++) { 
                if ($i != $numero2) {
                    echo "$i ";
                }
            }
            "<br>";
        } elseif ($numero1 < $numero2) {
            for ($i= $numero1; $i < $numero2 ; $i++) { 
               if ($i != $numero1) {
                   echo "$i ";
               }
            }
            "<br>";
        } else {
          echo "Valores iguais, informe valores diferentes!";  
        }
    } else {
        echo "Informe os 2 valores!";
    }

?>