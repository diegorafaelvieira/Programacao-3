<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>
	<h1>Modo 2</h1>
<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Esta linha executa o comando na string e retorna um array
	// onde cada elemento corresponde a uma linha da consulta
	$resultado = $db->query('SELECT * FROM Pessoa');

	// Acessamos os dados pelos seus indices
	// (numero da coluna da esquerda para a direita)
	foreach($resultado as $linha) {
	    echo $linha[0].' '.$linha[1].' '.$linha[2]."<br>";
	}
?>
</body>
</html>
