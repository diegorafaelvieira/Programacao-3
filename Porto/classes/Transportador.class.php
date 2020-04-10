<?php

class Transportador {

	//Atributos
	private $idTransportador;
	private $nome;
	private $senha;

	//Construtor
	public function construct ($idTransportador, $nome, $senha){
		$this->idTransportador = $idTransportador;
		$this->nome = $nome;
		$this->senha = $senha;
	} 

	//GET e SET
	public function getidTransportador()
	{
		return $this->idTransportador;
	}

	public function setidTransportador($_idTransportador)
	{
		$this->idTransportador = $_idTransportador;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($_nome)
	{
		$this->nome = $_nome;
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function setSenha($_senha)
	{
		$this->senha = $_senha;
	}


}

?>