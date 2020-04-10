<form action="exercicio6.php" method="GET">
MASSA:
<input type="number" name="massa"><br/>
<input type="submit" value="Calcular">
</form>


<?php
   if (!empty($_GET['massa'])) {
       $massa = $_GET['massa'];
       $minutos = 0;

       while ($massa > 0.05) {
        $massa -= round((($massa/100) * 0.05),2);
           $minutos++;
           echo "Minuto $minutos, massa = $massa"."<br>";
       }

   } else {
       echo "Informe a massa!";
   }

?>