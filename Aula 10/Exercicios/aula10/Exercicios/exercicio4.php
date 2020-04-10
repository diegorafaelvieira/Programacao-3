<form action="exercicio4.php" method="GET">
LADO 1:
<input type="number" name="lado1"><br/>
LADO 2:
<input type="number" name="lado2"><br/>
LADO 3:
<input type="number" name="lado3"><br/>
<input type="submit" value="Enviar">
</form>

<?php
    if ((!empty($_GET['lado1'])) || (!empty($_GET['lado2'])) || (!empty($_GET['lado3']))) {
        
        $lado1 = $_GET['lado1'];
        $lado2 = $_GET['lado2'];
        $lado3 = $_GET['lado3'];

        //AQUI VERIFICO SE É TRIÂNGULO
        if (($lado1+$lado2 > $lado3) && ($lado1+$lado3 > $lado2) && ($lado2+$lado3 > $lado1)) {
            
            //EQUILATERO
            if (($lado1 == $lado2) && ($lado1 == $lado3) && ($lado2 == $lado3)) {
                echo "EQUILÁTERO";
            }
            //ESCALENO
            elseif (($lado1 != $lado2) && ($lado1 != $lado3) && ($lado2 != $lado3)) {
                echo "ESCALENO";
            } else {
                echo "ISÓSCELES";
            }

        } else {
            echo "Não é um triângulo";
        }

    } else {
        echo "Informe os 3 valores!";
    }


?>