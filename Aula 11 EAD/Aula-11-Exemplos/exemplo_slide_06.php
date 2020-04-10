<html>
<head>
	<meta charset="UTF8">
</head>
<body>
	<form action="exemplo_slide_06.php">
	   <input type="checkbox" name="bebida1" value="vodka">Vodka<br>
	   <input type="checkbox" name="bebida2" value="whisky">Whisky<br>
	   <input type="checkbox" name="bebida3" value="cerveja">Cerveja<br><br>
	   <input type="submit">
	</form>
<?php
	//var_dump($_GET);
	if (!empty($_GET)) {
  		if (!empty($_GET['bebida1'])) {	
			$bebida1 = $_GET['bebida1'];
			echo $bebida1."<br>";
    	} 
  		if (!empty($_GET['bebida2'])) {	
			$bebida2 = $_GET['bebida2'];
			echo $bebida2."<br>";
    	}
  		if (!empty($_GET['bebida3'])) {	
			$bebida3 = $_GET['bebida3'];
			echo $bebida3."<br>";
    	}
	}
?>
</body>
</html>