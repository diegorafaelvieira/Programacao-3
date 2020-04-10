<?php

class Navio {

	//Atributos
	private $matricula;
	private $transportadora;
	private $comandante;
	private $idTransportador;

	//Construtor
	public function __construct($matricula, $transportadora, $comandante, $idTransportador) {
		$this->matricula = $matricula;
		$this->transportadora = $transportadora;
		$this->comandante = $comandante;
		$this->idTransportador = $idTransportador;
	}

	// GET e SET
	public function getMatricula()
	{
		return $this->matricula;
	}

	public function setMatricula($_matricula)
	{
		$this->matricula = $_matricula;
	}

	public function getTransportadora()
	{
		return $this->transportadora;
	}

	public function setTransportadora($_transportadora)
	{
		$this->transportadora = $_transportadora;
	}

	public function getComandante()
	{
		return $this->comandante;
	}

	public function setComandante($_comandante)
	{
		$this->comandante = $_comandante;
	}

	public function getIdTransportador()
	{
		return $this->idTransportador;
	}

	public function setIdTransportador($_idTransportador)
	{
		$this->idTransportador = $_idTransportador;
	}
}

?>