<?php
    session_start();

    if(!empty($_GET['usuario'] && (!empty($_GET['senha']))) ){
        $usuario = $_GET['usuario'];
        $senha = $_GET['senha'];

        if(($usuario == "admin") && ($senha == "12345") ){
            $_SESSION['$usuario'] = $usuario;
            $_SESSION['$senha'] = $senha;
            echo $_SESSION['$usuario']." - ".$_SESSION['$senha']." Sucesso ";
        
        } else {
            header("Location:login.php"); 
        }   

    } else {
        header("Location:login.php"); 
    }

?>
<p><a href="login.php">LOGOUT</a></p>