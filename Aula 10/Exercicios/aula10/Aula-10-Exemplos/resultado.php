<?php
	//var_dump($_GET);
	
	// $_GET eh vazia? Caso sim, o form nao foi enviado
	if (!empty($_GET)) {
    		// $_GET['nome'] eh vazia?
    		if (!empty($_GET['nome'])) {
				$nome = $_GET['nome'];
				echo "Buenas, ".$nome."!";
    		} else {
      			echo "O nome nao foi informado!";
			}
	} else {
		echo "Formulario nao enviado!";
	}
?>