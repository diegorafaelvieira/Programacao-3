<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>	
	<h1>Prepared Statements: Usando um array</h1>
	
<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

	$r = $db->prepare("SELECT * FROM Pessoa WHERE id=? OR nome=?");

	$id = 1;
	$nome = "Maria";

	$r->execute(array($id, $nome));
	$linhas = $r->fetchAll(PDO::FETCH_ASSOC);

	foreach($linhas as $linha) {
		echo $linha['id'].' '.$linha['nome'].' '.$linha['sobrenome']."<br>";
	}
?>
</body>
</html>
	