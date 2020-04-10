<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>
	<h1>Lidando com Erros</h1>
<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		/* Query com erro */
	    $db->query('Thundercat');
	} catch(PDOException $exception) {
		echo "<p><b> Occorreu um erro! </b></p>";
	    echo "<b>Mensagem</b>: ".$exception->getMessage();
	}

	echo "<p><b> ... mas o meu programa segue normalmente depois do erro ser tratado.</b></p>";
?>
</body>
</html>
