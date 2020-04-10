<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>	
	<h1>Prepared Statements: INSERT</h1>

<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

	$nome = "Jair";
	$sobrenome = "Kobe";

	$r = $db->prepare("INSERT INTO Pessoa(nome,sobrenome) VALUES(:nome,:sobrenome)");
	$r->execute(array(':nome' => $nome, ':sobrenome' => $sobrenome));
	if($r->rowCount() > 0) {
		echo "<p>Linha inserida!</p>";	
	}
?>

</body>
</html>