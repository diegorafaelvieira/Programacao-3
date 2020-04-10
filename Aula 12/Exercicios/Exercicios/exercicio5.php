<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Exercicio 5</title>
</head>
<body>
    <form action="exercicio5.php" method="GET">
    Login:<br/>
    <input type="text" name=usuario><br/><br/>
    Senha:<br/>
    <input type="password" name=senha><br/><br/>
    <input type="submit" value="Logar">

    <?php
      session_start();
      if(!isset($_SESSION['login'])) {

          if ((!empty($_GET["usuario"])) || (!empty($_GET["senha"])))  {
              $usuario = $_GET['usuario'];
              $senha = $_GET['senha'];
              
          } if (($usuario == "admin") && ($senha == "12345")) {
            header("Location:exercicio5-sucesso.php");
          }
        }  
    ?>
    
</body>
</html>