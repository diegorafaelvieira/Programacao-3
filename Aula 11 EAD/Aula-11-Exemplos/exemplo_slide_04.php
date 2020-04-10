<html>
<body>
	<form action="exemplo_slide_04.php" method="get">
	  Nome:<br>
	  <input type="text" name="nome"><br>
	  <input type="submit" value="Enviar">
	</form>
	
<?php
	if (!empty($_GET)) {
  		if (!empty($_GET['nome'])) {	
			$nome = $_GET['nome'];
			echo "Buenas, ".$nome."!";
    	} 
	}
?>
</body>
</html>