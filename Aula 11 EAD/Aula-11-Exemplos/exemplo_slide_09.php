<html>
<head>
	<meta charset="UTF8">
</head>
<body>
	<form action="exemplo_slide_09.php">
	  <select name="carro">
	    <option value="volvo">Volvo</option>
	    <option value="chevrolet">Chevrolet</option>
	    <option value="fiat">Fiat</option>
	    <option value="porsche">Porsche</option>
	  </select>
	  <br><br>
	  <input type="submit">
	</form>
<?php
	if (!empty($_GET)) {
  		if (!empty($_GET['carro'])) {	
			$carro = $_GET['carro'];
			echo "Carro: ".$carro."<br>";
    	} 
	}
?>
</body>
</html>