<?php
	// Se voce descomentar a linha abaixo, ocorra um erro pois a funcao header() 
	// nao pode ser chamada depois que algo foi impresso na tela
	// echo "Primeira impressao!";
	header("Location:exemplo_slide_12B.php"); /*faz o redicionamento */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>
<body>
	<?php
		echo "Isso aqui nao sera impresso!";
		echo "Porque foi feito um redirecionamento antes, na linha 5 acima.";
	?>
</body>
</html>