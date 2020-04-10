<?php 
   session_start();
   
   if(!isset($_SESSION['contador'])) {
       $_SESSION['contador'] = 1;
   } else {
       $_SESSION['contador']++;
   }

   if(isset($_GET["acao"])) {
      if($_GET["acao"] == "zerar") {
	    session_destroy(); // Aqui destroi a sessão
	    session_start();
	    $_SESSION['contador'] = 1;
	  }
   }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>
<body>
	<h1>Pagina A</h1>
	<p>Contador igual a <?php echo $_SESSION['contador']; ?></p>
	<p><a href="exemplo_slide_24.php">Clique aqui para recarregar a pagina.</a></p>
	<p><a href="exemplo_slide_24.php?acao=zerar">Clique aqui para destruir e reiniciar a sessao.</a></p>
</body>
</html>