<html>
<body>
<?php
	include_once 'classes/Continente.class.php';
	include_once 'classes/Pais.class.php';
	
	$c1 = new Continente();
	$p1 = new Pais("Brasil");
	$c1->registrar($p1);
	
	// Erro pois registrar() aceita somente Pais
	echo "<p>Exemplo de erro abaixo:</p>";
	$c1->registrar("Argentina");
?>
</body>
</html>