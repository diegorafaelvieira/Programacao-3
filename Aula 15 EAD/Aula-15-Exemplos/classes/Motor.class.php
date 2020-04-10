<?php
	class Motor {
		private $potencia;
		private $cilindros;
		
		function getPotencia() {
			return $this->potencia;
		}
		
		function setPotencia($_potencia) {
			$this->potencia = $_potencia;
		}
		
		function getCilindros() {
			return $this->cilindros;
		}
		
		function setCilindros($_cilindros) {
			$this->cilindros = $_cilindros;
		}
	}
?>





