<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>

<body>  
	<?php
			$valor = 1;

			switch($valor) {
				case 0: { 
					echo "Zero";
					break;
				}
				case 1: { 
					echo "Um";
					break;
				}	
				default: { 
					echo "Outro";
				}
			}
	?>
</body>
</html>