<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>	
	<h1>Prepared Statements: Usando o método bindValue</h1>
	
	<?php
		$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

		$id = 1;
		$nome = "Maria";

		$r = $db->prepare("SELECT * FROM Pessoa WHERE id=? OR nome=?");
		$r->bindValue(1, $id, PDO::PARAM_INT);
		$r->bindValue(2, $nome, PDO::PARAM_STR);
		$r->execute();
		$linhas = $r->fetchAll(PDO::FETCH_ASSOC);

		foreach($linhas as $linha) {
			echo $linha['nome'].' '.$linha['sobrenome']."<br>";
		}
	?>
</body>
</html>
