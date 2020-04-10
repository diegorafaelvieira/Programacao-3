<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    
    <title>Exercicio 1</title>
</head>
<body>
    
    
    <form action="exercicio1.php" method="GET">
        Informe o número de linhas:<br/>
        <input type="number" name="linhas" min=0><br/><br/>
        Informe o número de colunas:<br/>
        <input type="number" name="colunas" min=0><br/><br/>
        Informe a espessura da borda:<br/>
        <input type="number" name="borda" min=0><br/><br/>
        Informe o espaço entre a células:<br/>
        <input type="number" name="espaco" min=0><br/><br/>
        <input type="submit" value="Enviar">
    </form>

    <?php

        if((!empty(get['linhas'])) || (!empty(get['colunas'])) || (!empty(get['borda'])) || (!empty(get['espaco']))) {
            /*
            $linhas = $_GET['linhas'];
            $colunas = $_GET['colunas'];
            $borda = $_GET['bordas'];
            $espaco = $_GET['espaco'];

            /*
            function tabela() {
                echo "<table width=342 height=145 border=$bordas margin=$espaco>";
                 for($i = 0; $i < $linhas; $i++) {
                    echo "<tr>";
                 } for($j = 0; $j < $colunas; $j++) {
                    echo "<td>";
                 } 
                 echo"</td>";   
                 echo"</tr>";
                 echo"</table>";          
            }
            */
            function cria_tabela(){
                $linhas = $_GET['linhas'];
                $colunas = $_GET['colunas'];
                $borda = $_GET['borda'];
                $espaco = $_GET['espaco'];
                echo "<table width=342 height=145 border=$borda margin=$espaco bordercolor=#000000 bgcolor=#000000>";
                for($i = 0; $i < $linhas; $i++){
                echo "<tr bordercolor=#000000 bgcolor=#00FF00>";
                for($j = 0; $j < $colunas; $j++){
                echo "<td>&nbsp;</td>";
                }
                echo "</tr>";
                }
                echo "</table>";
                }
        }
    ?>

</body>
</html>