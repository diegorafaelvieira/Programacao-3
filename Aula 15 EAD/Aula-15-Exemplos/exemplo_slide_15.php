<html>
<body>
<?php
	include_once 'classes/Produto.class.php';

    $prod1 = new Produto();
    $prod2 = new Produto();

    $prod1->codigo = 200;
    $prod2->codigo = 200;

    if ($prod1 == $prod2) {
        echo "Iguais";
    } else {
		echo "Diferentes";
	}
?>
</body>
</html>