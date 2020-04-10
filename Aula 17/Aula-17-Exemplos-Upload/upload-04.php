<?php
	// Nome do arquivo
	$name = $_FILES['arquivo']['name'];
	// Tamanho do arquivo em bytes
	$size = $_FILES['arquivo']['size'];
	// Tipo do arquivo 
	$type = $_FILES['arquivo']['type'];
	// Arquivo temporário (caminho completo)
	$temp = $_FILES['arquivo']['tmp_name'];
	
	
	if (( isset($name) ) && ( !empty($name) )) {
		
			// Verifica o tamanho do arquivo
			if($size < 1000000) {
				$dest = 'uploads/'.$name;

				if (move_uploaded_file($temp,$dest)) {
					echo 'Upload  concluido.';
				} else {
					echo 'Erro no upload.';
				}
			} else {
				echo 'Tamanho maximo excedido.';
			}
		}
?>