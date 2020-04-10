<form action="exercicio5.php" method="GET">
CHICO:
<input type="number" name="chico"><br/>
JUCA:
<input type="number" name="juca"><br/>
<input type="submit" value="Calcular">
</form>

<?php
    if ((!empty($_GET['chico'])) || (!empty($_GET['juca']))) {
        
        $chico = $_GET['chico'];
        $juca = $_GET['juca'];
        $anos = 0;

        //altura de Chico seja maior que a altura de Juca,

        if ($chico >= $juca) {
           while($chico >= $juca) {
               $chico += 2;
               $juca += 3;
               $anos++;
               echo "Ano: $anos:"."<br>";
               echo "Altura Chico: $chico"."<br>";
               echo "Altura Juca: $juca"."<br>";
           }
           echo "Em ". $anos .", anos Juca terá $juca de altura e Chico terá $chico de altura.";
        } else {
            echo "Juca é maior do que Chico.";
        }

    } else {
        echo "Informe os valores!";
    }

?>