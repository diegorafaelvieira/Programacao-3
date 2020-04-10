<?php 
   session_start(); // Sempre colocar 
   
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
	<?php 
	   echo $_SESSION['contador'];
	?>
</body>
</html>