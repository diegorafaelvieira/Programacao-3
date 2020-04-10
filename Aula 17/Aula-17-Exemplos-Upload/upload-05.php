<?php
	// Nome do arquivo
	$name = $_FILES['arquivo']['name'];
	// Tamanho do arquivo em bytes
	$size = $_FILES['arquivo']['size'];
	// Tipo do arquivo 
	$type = $_FILES['arquivo']['type'];
	// Arquivo temporário (caminho completo)
	$temp = $_FILES['arquivo']['tmp_name'];
		
	// Obtem a extensao
	$extension = substr($name,strpos($name,'.') + 1);
	$extension = strtolower($extension);

	if (( isset($name) ) && ( !empty($name) )) {
		
		// Somente imagens do tipo JPG
		if(($extension=='jpg')&&($type=='image/jpeg')) {
			if($size < 1000000) {
				$dest = 'uploads/'.$name;
				if (move_uploaded_file($temp,$dest)) {
					echo 'Upload  concluido.';
				} else { echo 'Erro no upload.'; }
			} else { echo 'Tamanho maximo excedido.'; }
		} else { echo 'Tipo de arquivo invalido'; }
	} 
?>