<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>

<body>  
	<?php
			// Condicional com elseif
			$valor = -10;

			if($valor == 0) {
				echo "Zero!";
			} elseif($valor > 0) {
				echo "Positivo!";
			} else {
				echo "Negativo!";			
			}
	?>
</body>
</html>