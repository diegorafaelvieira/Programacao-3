<html>
<head>
	<meta charset="UTF8">
</head>
<body>
<?php
	$array1 = array(
	    array(1,2,3),
		array(4,5,6),
		array(7,8,9) );

	foreach($array1 as $i1 => $array2) {
		foreach($array2 as $i2 => $numero) {
			echo $numero." ";
		}
		echo "<br>";
	}
?>
</body>
</html>