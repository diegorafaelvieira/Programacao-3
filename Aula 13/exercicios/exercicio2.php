<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    
    <title>Exercicio 2</title>
</head>
<body>

    <?php

            function maiorvalor($lista) {
                $maior = 0;
                foreach ($lista as $key => $valor) {
                    if ($key == 0) {
                        $maior = $valor;
                    }
                    if ($valor > $maior) {
                        $maior = $valor;
                    }
                }
                echo "O maior valor é ".$maior;
            }
            $lista = [0,2,-1,-5];
            maiorvalor($lista);

    ?>
</body>
</html>