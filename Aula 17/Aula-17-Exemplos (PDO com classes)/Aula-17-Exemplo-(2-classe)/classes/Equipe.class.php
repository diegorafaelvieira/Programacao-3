<?php
	class Equipe {
		
		private $id;
		private $nome;
		private $cidade;
		private $atletas;
		
		public function getId() {
			return $this->id;
		}
		
		public function getNome() {
			return $this->nome;
		}
		
		public function getCidade() {
			return $this->cidade;
		}
		
		public function getAtletas() {
			return $this->atletas;
		}
		
		public function addAtleta(Atleta $atleta) {
			$this->atletas[] = $atleta;
		}
	}
?>