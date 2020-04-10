<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    
    <title>Exercicio 2</title>
</head>
<body>
    <form action="exercicio2.php" method="GET">
    URL:<br/>
    <input type="url" name="url"><br/><br/>
    ALT:<br/>
    <input type="number" name="a" min=0><br/><br/>
    HEIGHT:<br/>
    <input type="number" name="h" min=0><br/><br/>
    WIDTH:<br/>
    <input type="number" name="w" min=0><br/><br/>
    <input type="submit" value="Enviar"><br>


    <?php
        if((!empty($_GET['url'])) && (!empty($_GET['a'])) || (!empty($_GET['h'])) || (!empty($_GET['w']))) {

            function cria_imagem() {
                $url = $_GET['url'];
                $a = $_GET['a'];
                $h = $_GET['h'];
                $w = $_GET['w'];

               echo "<img src=$url alt=$a height=$h width=$w>";
               // echo "<img src="C:\xampp\htdocs\aula12\Exercicios\Patolino.png" alt=$a height=$h width=$w>"; 
            }


        } else {
            echo "Preencha todos os campos!";
        }
    ?>
</body>
</html>