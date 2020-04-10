<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercicio 2</title>
    <link href="css/../exercicio2.css" rel="stylesheet" />
    
<head>
<body>
    <h2>TABELA CAMPEONATO</h2>
    <?php
    $array1 = [["Nome","Cidade","Vitórias","Empates","Derrotas","Pontos"],
                ["Gremio","POA",2,0,0,6],
                ["Inter","POA",1,0,1,3],
                ["Juventude","CXS",0,1,1,1],
                ["Caxias","CXS",0,1,1,1] ];
    
    echo "<table border=1>";
    foreach ($array1 as $indice1 => $array2) {
        echo "<tr>";
        foreach ($array2 as $indice2 => $conteudo) {
            if ($indice1 == 0) {
                echo "<th>".$array2[$indice2]."</th>";
            } elseif (($indice1 != 0) && ($indice2 == 2)) {
                echo "<td class='vitoria'>".$array2[$indice2]."</td>";
            } elseif (($indice1 != 0) && ($indice2 == 3)) {
                echo "<td class='empate'>".$array2[$indice2]."</td>";
            } elseif (($indice1 != 0) && ($indice2 == 4)) {
                echo "<td class='derrota'>".$array2[$indice2]."</td>";
            } elseif (($indice1 != 0) && ($indice2 == 5)) {
                echo "<td class='pontos'>".$array2[$indice2]."</td>";
            } else {
                echo "<td>".$array2[$indice2]."</td>";
            }
        }
        echo "</tr>";
    }
    ?>
</body>
</html>