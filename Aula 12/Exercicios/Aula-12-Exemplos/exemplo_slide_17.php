<?php
	setcookie("nome","Lance Armstrong"); 
	
	// Descomente para apagar o cookie abaixo
	//setcookie("nome"); // só com nome serve para apagar o cookie
	
	// Coloca o tempo de 15 segundos
	// A funcao time() retorna o Unix time em segundos
	setcookie("pais","Spain",time()+15); // dura 15 seg
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>
<body>
	<p>Os cookies nome e pais foram criados.</p>
	<p><a href="exemplo_slide_18.php">Clique aqui para testar estes cookies</a></p>
</body>
</html>

