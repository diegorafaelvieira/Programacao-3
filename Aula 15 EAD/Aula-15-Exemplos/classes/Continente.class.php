<?php
	class Continente {
		private $paises;
		
		function __construct() {
			$this->paises = array();
			echo "O continente foi criado.<br/>";
		}
		
		function registrar(Pais $_pais) {
			$this->paises[] = $_pais;
		}
		
		function imprimirPaises() {
			echo "<ol>";
			foreach($this->paises as $p) {
				echo "<li>".$p->nome."</li>";
			}
			echo "</ol>";
		}
	}
?>





