<html>
<body>
<?php
	include_once 'classes/Continente.class.php';
	include_once 'classes/Pais.class.php';
	
	$c1 = new Continente();
	$p1 = new Pais("Brasil");
	$c1->registrar($p1);
	$p2 = new Pais("Alemanha");
	$c1->registrar($p2);
	$c1->imprimirPaises();
?>
</body>
</html>