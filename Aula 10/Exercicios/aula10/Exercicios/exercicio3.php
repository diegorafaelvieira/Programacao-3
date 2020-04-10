<form action="exercicio3.php" method="GET">
Número:
<input type="number" name="numero"> <br/>
<input type="submit" value="Enviar">
</form>

<?php

    if (!empty($_GET['numero'])) {
        $numero = $_GET['numero'];

        if($numero % 2 == 0) {
            echo "$numero é divisível por 2."."<br>";
            
        }
        if ($numero % 5 == 0) {
            echo "$numero é divisível por 5."."<br>";
            
        }
        if ($numero % 10 == 0) {
            echo "$numero é divisível por 10."."<br>";
            
        }
    } else {
        echo "$numero não é divisível por 2, 5 ou 10.";
    }

?>