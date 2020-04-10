<html>
<body>
<form action="exemplo_slide_26.php" method="post">
	<select name="partidos[]" size="4" multiple="multiple">
        <option value="PSDB">PSDB</option>
	    <option value="PMDB">PMDB</option>
	    <option value="PT">PT</option>
	    <option value="PP">PP</option>
	</select>
	<input type="submit"/>
</form>

<?php
	if(!empty($_POST['partidos'])) {
    	foreach($_POST['partidos'] as $part) {
            echo $part.'<br>';
    	}
	}
?>
</body>
</html>