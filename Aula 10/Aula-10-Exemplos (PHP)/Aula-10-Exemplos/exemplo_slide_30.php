<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>

<body>  
	<?php
		$c = 0;

		while($c < 10) {
			echo $c."<br>";
			$c++;
		}

		$d = 10;
		do {
			echo $d."<br>";
			$d++;
		} while($d < 20);
	?>
</body>
</html>