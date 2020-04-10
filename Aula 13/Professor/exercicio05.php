<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="exercicios.css"/>
</head>
<body>
	<form action="exercicio05.php" method="get">
	  Palavras:<br><input type="text" name="palavras" value="Maria, Jose, Lucas, Ana, Patricia, Joaquim"><br>
	  <input type="submit" value="Enviar">
	</form>

<?php
	function analisa($palavras) {
		$arrayPalavras = explode(",",$palavras);
		for($i=0; $i < count($arrayPalavras); $i++){
			$arrayPalavras[$i] = trim($arrayPalavras[$i]);
		}
		
		arsort($arrayPalavras);
		
		foreach($arrayPalavras as $p) {
			echo $p."<br>";
		}
	}
	
	
	$palavras = null;
	
	if (!empty($_GET)) {
  		if (!empty($_GET['palavras']) && is_string($_GET['palavras'])) {	
			$palavras = $_GET['palavras'];
			analisa($palavras);
    	} else {
			echo "<p>Informe as palavras separadas por virgula!</p>";
		}
	}
?>
</body>
</html>