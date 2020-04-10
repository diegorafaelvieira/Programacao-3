<html>
<head>
	<meta charset="UTF8">
</head>
<body>
	<form action="exemplo_slide_08.php">
	  	<textarea name="mensagem" rows="10" cols="30"></textarea>
		<br>
	  	<input type="submit">
	</form>
<?php
	if (!empty($_GET)) {
  		if (!empty($_GET['mensagem'])) {	
			$mensagem = $_GET['mensagem'];
			echo "</p>".$mensagem."</p>";
    	} 
	}
?>
</body>
</html>