<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>	
	<h1>Prepared Statements: Usando um array e named params</h1>
	
<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

	$r = $db->prepare("SELECT * FROM Pessoa WHERE id=:id OR nome=:nome");

	$id = 2;
	$nome = "Marcela";

	$r->execute(array(':nome' => $nome, ':id' => $id));
	$linhas = $r->fetchAll(PDO::FETCH_ASSOC);

	foreach($linhas as $linha) {
		echo $linha['id'].' '.$linha['nome'].' '.$linha['sobrenome']."<br>";
	}
?>
</body>
</html>