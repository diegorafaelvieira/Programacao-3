<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Exercicio 4</title>
</head>
<body>
    <h2>Capitais</h2>

    <?php

    $capitais = array(
        1 => "Porto_Alegre",
        2 => "Florianopolis",
        3 => "Curtiba",
        4 => "São_Paulo",
        5 => "Rio_de_Janeiro"
    );

    echo "<form action='exercicio4.php' method='POST'>";
        foreach ($capitais as $key => $value) {
            echo "<input type='checkbox' name='capitais[]' value=".$capitais[$key].">".$capitais[$key]."<br>";

        }
        echo "<input type='submit' value='Enviar'>";
        echo "</form>";
    ?>

    <?php
        if (!empty($_POST['capitais'])) {
            foreach ($_POST['capitais'] as $key => $value) {
                echo $value."<br>";
            }
        }
    ?>
    
</body>
</html>