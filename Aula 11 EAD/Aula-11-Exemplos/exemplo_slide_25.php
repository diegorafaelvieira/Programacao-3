<html>
<body>
<form action="exemplo_slide_25.php" method="post">
	<input type="checkbox" name="letras[]" value="letraA">A<br>
	<input type="checkbox" name="letras[]" value="letraB">B<br>
	<input type="checkbox" name="letras[]" value="letraC">C<br>
	<input type="checkbox" name="letras[]" value="letraD">D<br>
	<input type="checkbox" name="letras[]" value="letraE">E<br>
	<br>
	<input type="submit" />
</form>

<?php
	if(!empty($_POST['letras'])) {
    	foreach($_POST['letras'] as $letra) {
            echo $letra.'<br>';
    	}
	}
?>
</body>
</html>