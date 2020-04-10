<?php
  session_start();
  if(isset($_GET))
	if(isset($_GET["nome"]) && isset($_GET["sobrenome"]) && isset($_GET["idade"]) ) {
		
		$nomeCompleto = $_GET["nome"]." ".$_GET["sobrenome"];
		$idade = $_GET["idade"];
	
		if(!isset($_SESSION["nomeCompleto"])) {
			$_SESSION["nomeCompleto"] = array();
		} else {
			array_push($_SESSION["nomeCompleto"],$nomeCompleto);
		}
	
 		if(!isset($_SESSION["idade"]))
			$_SESSION["idade"] = $idade;
		else {
			$_SESSION["idade"] += $idade;
		}
	}
?>
<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="exercicios.css"/>	
</head>
<body>
<h2>Exercicio 03</h2>

<form action="exercicio03.php" method="get">
	<input type="text" name="nome" value="Lucas">
	<input type="text" name="sobrenome" value="Silva">
	<input type="text" name="idade" value="33">
	<input value="Enviar" type="submit">
</form>

<?php
	if(isset($_SESSION["idade"])) {
		echo "<p> Idade total: ".$_SESSION["idade"]."</p>";
	}
	
	if(isset($_SESSION["nomeCompleto"])) {
		foreach ($_SESSION["nomeCompleto"] as $indice => $conteudo) {
			echo $indice." - ".$conteudo."<br>";
		}
		//$_SESSION["nomeCompleto"]
	}
	
?>

</body>
</html>