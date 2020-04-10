<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>	
	<h1>Prepared Statements: UPDATE</h1>

<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	
	$id = 4;
	$nome = "Charlie";

	$r = $db->prepare("UPDATE Pessoa SET nome=? WHERE id>?");
	$r->execute(array($nome, $id));
	$numeroLinhas = $r->rowCount();
	echo $numeroLinhas." linhas atualizadas!";
?>

</body>
</html>