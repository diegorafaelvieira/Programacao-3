<html>
<head>
	<meta charset="UTF8">
</head>
<body>
<?php
	$array1 = array(
	    "um" => "Brasil",
	    2 => "Argentina",
	    "tres" => "Uruguay",
		4 => "Chile" );

	$array1[] = "Paraguay";
	$array1["seis"] = "Colombia";
	$array1[] = "Peru";
	
	foreach ($array1 as $indice => $conteudo) {
	    echo $indice." - ".$conteudo."<br>";
	}
?>
</body>
</html>