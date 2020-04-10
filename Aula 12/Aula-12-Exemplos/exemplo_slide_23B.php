<?php 
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>
<body>
	<?php 
		if(isset($_SESSION['contador'])) {
       		echo "Contador = ".$_SESSION['contador'];
   		}
	?>
	<p><a href="exemplo_slide_23A.php">Clique aqui para voltar.</a></p>
</body>
</html>