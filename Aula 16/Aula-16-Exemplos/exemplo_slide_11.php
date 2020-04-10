<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>
	<h1>Insert</h1>
<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$numeroLinhasInseridas = $db->exec("INSERT INTO Pessoa (nome,sobrenome) VALUES ('Maria','Silva')");

	echo $numeroLinhasInseridas." linha foi inserida.";
?>
</body>
</html>
