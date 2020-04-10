<?php
	class Atleta {
		
		private $id;
		private $nome;
		private $sobrenome;
		private $posicao;

		public function getId() {
			return $this->id;
		}
		
		public function getNome() {
			return $this->nome;
		}
		
		public function getSobrenome() {
			return $this->sobrenome;
		}
		
		public function getPosicao() {
			return $this->posicao;
		}
	}
?>