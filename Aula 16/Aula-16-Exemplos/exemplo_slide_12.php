<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>
	<h1>Update</h1>
<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$numeroLinhasAtualizadas = $db->exec("UPDATE Pessoa SET nome='Mike' WHERE sobrenome='Silva'");
	echo $numeroLinhasAtualizadas." linhas foram atualizadas.";
?>
</body>
</html>
