<html>
<head>
	<meta charset="UTF8">
</head>
<body>
<?php
	$array1 = array(10,20,30,40,50);
	unset($array1[1]);
	unset($array1[3]);
	var_dump($array1);
	echo "<br>";
	$array2 = array_values($array1);
	var_dump($array2);
?>
</body>
</html>