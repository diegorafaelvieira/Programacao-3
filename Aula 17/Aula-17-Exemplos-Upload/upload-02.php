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
		move_uploaded_file($temp,'uploads/'.$name);
		echo 'Upload  concluido.';
	}					
?>