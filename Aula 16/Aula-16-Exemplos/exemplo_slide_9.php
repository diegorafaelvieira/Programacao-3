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

	// Descomente apenas uma das linhas abaixo
	$linhas = $resultado->fetchAll(PDO::FETCH_ASSOC);
	//$linhas = $resultado->fetchAll(PDO::FETCH_NUM);
	//$linhas = $resultado->fetchAll(PDO::FETCH_BOTH);

	print_r($linhas);
?>
</body>
</html>
