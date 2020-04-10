<html>
<body>

<?php
	function incrementa($variavel,$valor) {
		$variavel += $valor;
	}

	$a = 10;
	incrementa($a,20);
	// Note que o valor de $a nao foi alterado pela funcao
	echo $a;	
?>

</body>
</html>