<?php
include_once 'Empregado.class.php';
?>

<p>
	<?php
	$e1 = new Empregado();
	$e1->setNome("Pedro De Pacas");
	$e1->setNumeroFilhos(1);
	$e1->setHorasTrabalhadas(160);
	$e1->setValorHora(20);
	$e1->imprimir();
	echo "Saláriorio Base: R$".$e1->calculaSalarioBase()."<br/>";
	echo "Bônus Famí­lia: R$".$e1->calculaBonusFamilia()."<br/>";
	echo "Salário Bruto: R$".$e1->calculaSalarioBruto()."<br/>";
	echo "Salário Lí­quido: R$".$e1->calculaSalarioLiquido();
	?>
</p>


<p>
	<?php
	$e2 = new Empregado();
	$e2->setNome("Carlos Sanchez");
	$e2->setNumeroFilhos(2);
	$e2->setHorasTrabalhadas(160);
	$e2->setValorHora(20);
	$e2->imprimir();
	echo "Salário Base: R$".$e2->calculaSalarioBase()."<br/>";
	echo "Bônus Famí­lia: R$".$e2->calculaBonusFamilia()."<br/>";
	echo "Salário Bruto: R$".$e2->calculaSalarioBruto()."<br/>";
	echo "Salário Lí­quido: R$".$e2->calculaSalarioLiquido();
	?>
</p>