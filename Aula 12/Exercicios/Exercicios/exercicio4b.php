<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    
    <title>Exercicio 4B </title>
</head>
<body>
    <p>
    <?php
        if($_COOKIE["val"] == null) {
            echo "val == null<br>";
        } else {
            echo $_COOKIE["val"]."<br>";
        }
    ?>
    </p>
</body>
</html>
