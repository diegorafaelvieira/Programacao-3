<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>
	<h1>Modo 3</h1>
<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$resultado = $db->query('SELECT * FROM Pessoa');

	$numeroLinhas = $resultado->rowCount();
	echo $numeroLinhas.' linhas foram selecionadas!';
?>
</body>
</html>
