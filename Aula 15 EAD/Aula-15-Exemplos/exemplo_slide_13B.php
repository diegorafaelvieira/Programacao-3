<html>
<body>
	
<?php
	include_once 'classes/Carro.class.php';
?>

<p>
<?php
	$c1 = new Carro();
	$c1->setMarca("VW");
	$c1->setModelo("Jetta");
	$c1->setMotor(176,6);
	$c1->imprimirEspecificacao();
?>
</p>

<p>
<?php
	$c2 = new Carro();
	$c2->setMarca("Honda");
	$c2->setModelo("Fit");
	$c2->setMotor(115,4);
	$c2->imprimirEspecificacao();
?>
</p>
</body>
</html>