<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
</head>
<body>
<?php
	$db = new PDO('mysql:host=localhost;dbname=aula16;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "A conexão com o BD foi criada!";
?>

</body>
</html>
