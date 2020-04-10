<html>
<head>
	<meta charset="utf8">
</head>
<body>

<?php
	function imprimeArray($meuArray,$tamanho) {
		
		if(is_array($meuArray)) {
			echo "Tamanho: ".$tamanho."<br>";
			foreach($meuArray as $elemento) {
				echo " - ".$elemento."<br>";
			}
		} else {
			echo "O parâmetro não é um array.";
		}
	}
	
	$a = ["Um","Dois","Tres","Quatro","Cinco"];
	imprimeArray($a,count($a));
?>
</body>
</html>