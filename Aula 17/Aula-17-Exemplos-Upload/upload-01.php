<?php
	// Nome do arquivo
	$name = $_FILES['arquivo']['name'];
	// Tamanho do arquivo em bytes
	$size = $_FILES['arquivo']['size'];
	// Tipo do arquivo 
	$type = $_FILES['arquivo']['type'];
	// Arquivo temporário (caminho completo)
	$temp = $_FILES['arquivo']['tmp_name'];


	// Apenas mostra os dados enviados via formulario
	echo $name."<br>";
	echo $size."<br>";
	echo $type."<br>";
	echo $temp."<br>";						
?>