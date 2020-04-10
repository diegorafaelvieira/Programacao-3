<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>
<body>
<p>
	<?php
		if($_COOKIE["nome"] == null) {
			echo "nome == null<br>";
		} else {
			echo $_COOKIE["nome"]."<br>";
		}

		if($_COOKIE["pais"] == null) {
			echo "pais == null<br>";
		} else {
			echo $_COOKIE["pais"]."<br>";
		}
	?>
</p>
</body>
</html>
	
	
	

