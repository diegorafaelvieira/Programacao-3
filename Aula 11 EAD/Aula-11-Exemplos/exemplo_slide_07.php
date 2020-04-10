<html>
<body>
	<form action="exemplo_slide_07.php" method="post">
	  Senha:<br>
	  <input type="password" name="senha"><br>
	  <input type="submit" value="Enviar">
	</form>
	
<?php
	if (!empty($_POST)) {
  		if (!empty($_POST['senha'])) {	
			$senha = $_POST['senha'];
			echo "Senha: ".$senha;
    	} 
	}
?>
</body>
</html>