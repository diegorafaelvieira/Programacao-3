<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>	
	<h1>Mapping: classe Pessoa</h1>
<?php
	include_once 'classes/Pessoa.class.php';

	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	try {
		$query = 'SELECT id, nome, sobrenome FROM Pessoa';
		$r = $db->query($query);
		$r->setFetchMode(PDO::FETCH_CLASS, 'Pessoa');

		while ($pessoa = $r->fetch()) {
		    echo $pessoa->info()."<br>\n";
		}
		
	} catch(PDOException $exception) {
		echo "<p><b> Occorreu um erro! </b></p>";
	    echo $exception->getMessage();
	}
?>
</body>
</html>