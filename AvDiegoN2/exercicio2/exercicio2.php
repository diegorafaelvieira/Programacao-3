<?php
    /*
    $array1 = [["Nome","Cidade","Vitorias","Empates","Derrotas","Pontos"],
                ["Gremio","POA",2,0,0,6],
                ["Inter","POA",1,0,1,3],
                ["Juventude","CXS",0,1,1,1],
                ["Caxias","CXS",0,1,1,1] ];
    */
    $array1 = array (
        array("Nome","Cidade","Vitorias","Empates","Derrotas","Pontos"),
        array("Gremio","POA",2,0,0,6),
        array("Inter","POA",1,0,1,3),
        array("Juventude","CXS",0,1,1,1),
        array("Caxias","CXS",0,1,1,1) );

        echo "<table border=1px>";
        foreach ($array1 as $time => $dado) {
            echo "<tr>";
            echo "<td>".$dado[0]."</td>";
            echo "<td>".$dado[1]."</td>";
            echo "<td>".$dado[2]."</td>";
            echo "<td>".$dado[3]."</td>";
            echo "<td>".$dado[4]."</td>";
            echo "<td>".$dado[5]."</td>";
            echo "</tr>";
        }

?>