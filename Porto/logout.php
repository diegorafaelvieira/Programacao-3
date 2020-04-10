<?php
session_start();
if (isset($_SESSION['nomeOperador'])) {
    unset($_SESSION['nomeOperador']);
    unset($_SESSION['senhaOperador']);
    unset($_SESSION['logado']);    
} else {
    unset($_SESSION['nomeTransportador']);
    unset($_SESSION['senhaTransportador']);
    unset($_SESSION['logado']);
}
header("location: login.php");
?>