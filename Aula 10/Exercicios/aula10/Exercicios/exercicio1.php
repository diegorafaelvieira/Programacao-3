<form action="exercicio1.php" method="get">
    Salário:<br>
        <input type="number" name="salario" step=0.01 > <br>
        <input type="submit" value="Enviar">
</form>


<?php
    // $_GET é vazia?
    if (!empty($_GET['salario'])) {
        
        // $_GET['salario'] é vazia?
        // mostrar conteúdo em GET
        $salario = $_GET['salario'];
        
        if ($salario <= 300 ) {
           //Reajuste de 50% salário
           $novoSalario = $salario + (($salario/100) * 50);
           echo "Salário informado é R$ ".$salario." e seu reajuste foi de 50%"."<br>"; 
           echo "Novo salário é R$ ".$novoSalario;
           
        } else {
            //Reajuste de 30% salário
            $novoSalario = $salario + (($salario/100) * 30);
            echo "Salário informado é R$ ".$salario." e seu reajuste foi de 30%"."<br>"; 
            echo "Novo salário é R$ ".$novoSalario;
        }
    } else  {
        echo "Formulario não enviado!";
    }
?>