<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>	
	<h1>Prepared Statements: Usando o método bindValue com named params</h1>

<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	
	$id = 2;
	$nome = "Marcela";
	
	$r = $db->prepare("SELECT * FROM Pessoa WHERE id=:id OR nome=:nome");
	$r->bindValue(':id', $id, PDO::PARAM_INT);
	$r->bindValue(':nome', $nome, PDO::PARAM_STR);
	$r->execute();
	$linhas = $r->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($linhas as $linha) {
		echo $linha['nome'].' '.$linha['sobrenome']."<br>";
	}
?>

</body>
</html>