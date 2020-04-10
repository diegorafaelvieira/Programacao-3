<html>
<head>
	<meta charset="utf8">
</head>
<body>

<?php
	function maior($meuArray) {
		
		if(is_array($meuArray) && (count($meuArray) > 0)) {
			$m = $meuArray[0];
			foreach($meuArray as $elemento) {
				if($elemento > $m) {
					$m = $elemento;
				}
			}
			echo "Maior: ".$m;
		} else {
			echo "O parâmetro não é um array.";
		}
	}
	
	$a = [-25,7,54,33,-2,0,4,-13];
	maior($a);
?>
</body>
</html>