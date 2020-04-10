<?php
	class Pessoa {
		private $id;
		private $nome;
		private $sobrenome;

		public function info() {
			$r  =  '#'.$this->id;
			$r .= ':'.$this->nome;
			$r .= ' '.$this->sobrenome;
			return $r;
		}
	}
?>