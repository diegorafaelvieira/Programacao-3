<?php 
   session_start();
   $_SESSION['contador'] = 1000;
   unset($_SESSION['contador']); // aqui APAGA
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>
<body>
	<?php 
	   if(!isset($_SESSION['contador'])) {
	      echo "Contador nulo!";
	   }
	?>
</body>
</html>