<?php

class Caminhao {

	//Atributos
	private $placa;
	private $transportadora;
	private $motorista;
	private $idTransportador;

	//Construtor
	public function __construct($placa, $transportadora, $motorista, $idTransportador) {
		$this->placa = $placa;
		$this->transportadora = $transportadora;
		$this->motorista = $motorista;
		$this->idTransportador = $idTransportador;

	}

	//GET e SET
	public function getPlaca()
	{
		return $this->placa;
	}

	public function setPlaca($_placa)
	{
		$this->placa = $_placa;
	}

	public function getTransportadora()
	{
		return $this->transportadora;
	}

	public function setTransportadora($_placa)
	{
		$this->transportadora = $_transportadora;
	}

	public function getMotorista()
	{
		return $this->motorista;
	}

	public function setMotorista($_motorista)
	{
		$this->motorista = $_motorista;
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