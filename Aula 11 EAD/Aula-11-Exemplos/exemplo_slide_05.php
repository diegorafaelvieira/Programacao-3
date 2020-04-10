<html>
<head>
	<meta charset="UTF8">
</head>
<body>
	<form action="exemplo_slide_05.php">
	  <input type="radio" name="resp" value="sim" checked> Sim <br>
	  <input type="radio" name="resp" value="nao"> Não <br>
	  <input type="radio" name="resp" value="talvez"> Talvez <br>
	  <input type="submit" value="Enviar">
	</form>
<?php
	if (!empty($_GET)) {
  		if (!empty($_GET['resp'])) {	
			$resposta = $_GET['resp'];
			echo "Resposta: ".$resposta;
    	} 
	}
?>
</body>
</html>