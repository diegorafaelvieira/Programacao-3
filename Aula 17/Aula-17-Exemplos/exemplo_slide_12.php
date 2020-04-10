<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>	
	<h1>Prepared Statements: DELETE</h1>

<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	
	$id = 4;

	$r = $db->prepare("DELETE FROM Pessoa WHERE id>?");
	$r->execute(array($id));
	$numeroLinhas = $r->rowCount();
	echo $numeroLinhas." linhas removidas!";
?>

</body>
</html>