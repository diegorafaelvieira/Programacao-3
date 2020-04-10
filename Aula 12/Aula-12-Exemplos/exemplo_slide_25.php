<?php 
   session_start();
   
   if(!isset($_SESSION['numeros'])) {
       $_SESSION['numeros'] = array();
   } else {
	   // preenche com numeros aleatorios
       $_SESSION['numeros'][] = rand(1,1000);
	   //asort($_SESSION['numeros']);
   }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>
<body>
	<h1>Array:</h1>
	<p>
		<?php 
			foreach($_SESSION['numeros'] as $valor) {
			   echo $valor.", "; 	
			}
		?>
	</p>
	<p><a href="exemplo_slide_25.php">Clique aqui para recarregar a pagina e adicionar novos elementos no array.</a></p>
</body>
</html>