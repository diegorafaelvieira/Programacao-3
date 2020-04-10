<?php

class Empregado {
	private $nome;
	private $numeroFilhos;
	private $horasTrabalhadas;
	private $valorHora;


	function getNome() {
		return $this->nome;
	}

	function setNome($_nome) {
		$this->nome = $_nome;
	}

	function getNumeroFilhos() {
		return $this->numeroFilhos;
	}

	function setNumeroFilhos($_numeroFilhos) {
		$this->numeroFilhos = $_numeroFilhos;
	}

	function getHorasTrabalhadas() {
		return $this->horasTrabalhadas;
	}

	function setHorasTrabalhadas($_horasTrabalhadas) {
		$this->horasTrabalhadas = $_horasTrabalhadas;
	}

	function getValorHora() {
		return $this->valorHora;
	}

	function setValorHora($_valorHora) {
		$this->valorHora = $_valorHora;
	}	

	function calculaSalarioBase() {
		$salarioBase = $this->getHorasTrabalhadas() * $this->getvalorHora();
		
		return $salarioBase;
		//echo "Salário Base: R$".$salarioBase."<br/>";
	}

	function calculaBonusFamilia() {
		$numeroFilhos = $this->getNumeroFilhos();
		$bonusFamilia = (5/100) * ($this->getHorasTrabalhadas() * $this->getvalorHora()) * $numeroFilhos;
		
		return $bonusFamilia; 
		//echo "Bônus Família: R$".$bonusFamilia."<br/>";
	}

	function calculaSalarioBruto() {

		$salarioBruto = $this->calculaSalarioBase() + $this->calculaBonusFamilia();

		return $salarioBruto;

	}

	function calculaSalarioLiquido() {

		$desconto = 0;
		$salarioLiquido = 0;

		$salarioBruto = $this->calculaSalarioBruto();

		if ($salarioBruto <= 500) {

			$salarioLiquido = $salarioBruto;

		}

		if ($salarioBruto > 500 && $salarioBruto <= 1500) {

			$desconto = (8/100) * $salarioBruto;

			$salarioLiquido = $salarioBruto - $desconto;

		}

		if ($salarioBruto > 1500) {

			$desconto = (15/100) * $salarioBruto;

			$salarioLiquido = $salarioBruto - $desconto;

		}

		return $salarioLiquido;

	}

	function imprimir() {
		echo "Nome: ".$this->getNome()."<br/>";
		echo "Número de filhos: ".$this->getNumeroFilhos()."<br/>";
		echo "Horas trabalhadas: ".$this->getHorasTrabalhadas()."<br/>";
		echo "Valor hora: R$".$this->getValorHora()."<br/>";

	}

	
}
?>

