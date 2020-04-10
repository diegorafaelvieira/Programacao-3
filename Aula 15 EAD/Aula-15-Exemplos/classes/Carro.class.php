<?php
	include_once 'Motor.class.php';

	class Carro {
		private $marca;
		private $modelo;
		private $motor;
		
		function getMarca() {
			return $this->marca;
		}
		
		function setMarca($_marca) {
			$this->marca = $_marca;
		}
		
		function getModelo() {
			return $this->modelo;
		}
		
		function setModelo($_modelo) {
			$this->modelo = $_modelo;
		}
		
		function setMotor($_potencia, $_cilindros) {
			$this->motor = new Motor();
			$this->motor->setPotencia($_potencia);
			$this->motor->setCilindros($_cilindros);
		}
		
		function imprimirEspecificacao() {
			echo $this->getMarca()." ".$this->getModelo()."<br/>";
			echo "Potencia: ".$this->motor->getPotencia()."<br/>";
			echo "Cilindros: ".$this->motor->getCilindros()."<br/>";
		}
	}
?>





