<?php

class CarregarNavio {

	//Atributos
	private $idCarregarNavio;
	private $dataCarregarNavio;
	private $matricula;
	private $idContainer;

	//Construtor
	public function __construct($idCarregarNavio, $dataCarregarNavio, $matricula, $idContainer) {
		$this->idCarregarNavio = $idCarregarNavio;
		$this->dataCarregarNavio = $dataCarregarNavio;
		$this->matricula = $matricula;
		$this->idContainer = $idContainer;
	}

	//GET e SET
	public function getIdCarregarNavio()
	{
		return $this->idCarregarNavio;
	}

	public function setIdCarregarNavio($_idCarregarNavio)
	{
		$this->idCarregarNavio = $_idCarregarNavio;
	}

	public function getDataCarregarNavio()
	{
		return $this->dataCarregarNavio;
	}

	public function setDataCarregarNavio($_dataCarregarNavio)
	{
		$this->dataCarregarNavio = $_dataCarregarNavio;
	}

	public function getMatricula()
	{
		return $this->matricula;
	}

	public function setMatricula($_matricula)
	{
		$this->matricula = $_matricula;
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