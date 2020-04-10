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
		$instituicao = "IFRS";
	?>

	<h1>Welcome, <?php echo $nome?>!</h1>
	<p>
		You have <?php echo $idade?> years old.
	</p>
    
    <h5>Maria estuda na instituição <?php echo $instituicao?> .</h5>   
</body>
</html>