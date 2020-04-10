<html>
<body>
	
<?php
	include_once 'classes/Produto.class.php';
?>

<p>
<?php
	$p1 = new Produto();
	
	// Note que o $ vai apenas na frente do objeto!
	// Nao repetimos o $ na frente do atributos
	$p1->codigo = 1234;
	$p1->descricao = "Erva Mate";
	$p1->preco = 9.50;
	$p1->quantidade = 2;
	
	// Podemos acessar os atributos diretamente pois sao public
	// No exemplo abaixo, imprimimos os atributos na tela
	echo "<p>";
	echo $p1->codigo."<br/>";
	echo $p1->descricao."<br/>";
	echo $p1->preco."<br/>";
	echo $p1->quantidade."<br/>";
	echo "</p>";	
	
	// Podemos chamar metodos da classe
	$p1->imprimir();
	$p1->imprimirDestacado();
	
	// Nunca use echo em um objeto
	//echo $p1;
?>
</p>

</body>
</html>