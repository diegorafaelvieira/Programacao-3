<html>
<body>


<?php
	function escreve($frase) {
		echo $frase;
		// Essa funcao NAO tem return
	}

	$retorno = escreve("Nada a declarar");
	echo "<br>";
	var_dump($retorno); 
?>

</body>
</html>