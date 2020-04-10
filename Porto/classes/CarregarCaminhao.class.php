<?php

class CarregarCaminhao {

	//Atributos
	private $idCarregarCaminhao;
	private $dataCarregarCaminhao;
	private $placa;
	private $idContainer;

	//Construtor
	public function __construct ($idCarregarCaminhao, $dataCarregarCaminhao, $placa, $idContainer) {
		$this->idCarregarCaminhao = $idCarregarCaminhao;
		$this->dataCarregarCaminhao = $dataCarregarCaminhao;
		$this->placa = $placa;
		$this->idContainer = $idContainer;
	}

	//GET e SET
	public function getIdCarregarCaminhao()
	{
		return $this->idCarregarCaminhao;
	}

	public function setIdCarregarCaminhao($_idCarregarCaminhao)
	{
		$this->idCarregarCaminhao = $_idCarregarCaminhao;
	}

	public function getDataCarregarCaminhao()
	{
		return $this->dataCarregarCaminhao;
	}

	public function setDataCarregarCaminhao($_dataCarregarCaminhao)
	{
		$this->dataCarregarCaminhao = $_dataCarregarCaminhao;
	}

	public function getPlaca()
	{
		return $this->placa;
	}

	public function setPlaca($_placa)
	{
		$this->placa = $_placa;
	}

	public function getIdContainer()
	{
		return $this->idContainer;
	}

	public function setIdContainer($_idContainer)
	{
		$this->idContainer = $_idContainer;
	}
}

?>