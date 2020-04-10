<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aula de PHP</title>
</head>

<body>  
	<?php
		$nome = "Maria";
		$idade = 30;
		$intutuicao = "IFRS";
	?>

	<h1>Welcome, <?php echo $nome?>!</h1>
	<p>
		You have <?php echo $idade?> years old.
		Ela estuda na instituição <?php echo $intutuicao?>.
	</p>
</body>
</html>