<?php 
   session_start();
   
   if(!isset($_SESSION['contador'])) {
       $_SESSION['contador'] = 1;
   } else {
       $_SESSION['contador']++;
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
	<p><a href="exemplo_slide_23A.php">Clique aqui para recarregar a pagina.</a></p>
	<p><a href="exemplo_slide_23B.php">Clique aqui para ir a pagina B.</a></p>
</body>
</html>