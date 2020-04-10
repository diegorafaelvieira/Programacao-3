<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercicio 1</title>
    
<head>
<body>
    <h2>LISTA ORDENADA</h2>
    <?php
        $array1 = array("Gremio","Inter","Juventude","Caxias");
        foreach ($array1 as $indice => $conteudo) {
            if ($indice == 0)  {
                echo "<ol>";
                }
                echo "<li>".$conteudo."</li><br>";
            }
            echo "</ol>"
    ?>

</body>
</html>