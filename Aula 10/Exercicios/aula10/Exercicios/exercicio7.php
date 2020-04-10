<form action="exercicio7.php" method="GET">
SELECT:
<input type="number" name="select"><br>
<input type="submit" value="Enviar">
</form>

<?php
    if (!empty($_GET['select'])) {
        $select = $_GET["select"];

        for ($i=0; $i <= $select ; $i++) { 
            if ($i == 0) {
                {echo "<select name='select'>";}
            }
            echo "<option value=$i>Alternativa $i </option>";
        } 
        echo "</select>";
    
    } else {
        echo "Informe as alternativas";
    }

?>