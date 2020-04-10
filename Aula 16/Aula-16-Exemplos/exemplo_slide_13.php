<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>
	<h1>Delete</h1>
<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$numeroLinhasApagadas = $db->exec("DELETE FROM Pessoa WHERE sobrenome='Silva'");
	echo $numeroLinhasApagadas." linhas foram apagadas.";
?>
</body>
</html>
