<?php

class Container {

	//Atributos
	private $idContainer;
	private $descricao;
	private $localizacao;
	private $origem;
	private $destino;
	private $dataEntrada;
	private $dataSaida;

	//Construtor
	public function __construct ($idContainer, $descricao, $localizacao, $origem, $destino, $dataEntrada, $dataSaida) {
		$this->idContainer = $idContainer;
		$this->descricao = $descricao;
		$this->localizacao = $localizacao;
		$this->origem = $origem;
		$this->destino = $destino;
		$this->dataEntrada = $dataEntrada;
		$this->dataSaida = $dataSaida;
	}

	//GET e SET
	public function getIdContainer()
	{
		return $this->idContainer;
	}

	public function setIdContainer($_idContainer)
	{
		$this->idContainer = $_idContainer;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setDescricao($_descricao)
	{
		$this->descricao = $_descricao;
	}

	public function getLocalizacao()
	{
		return $this->localizacao;
	}

	public function setLocalizacao($_localizacao)
	{
		$this->localizacao = $_localizacao;
	}

	public function getOrigem()
	{
		return $this->origem;
	}

	public function setOrigem($_origem)
	{
		$this->origem = $_origem;
	}

	public function getDestino()
	{
		return $this->destino;
	}

	public function setDestino($_destino)
	{
		$this->destino = $_destino;
	}

	public function getDataEntrada()
	{
		return $this->dataEntrada;
	}

	public function setDataEntrada($_dataEntrada)
	{
		$this->dataEntrada = $_dataEntrada;
	}

	public function getDataSaida()
	{
		return $this->dataSaida;
	}

	public function setDataSaida($_dataSaida)
	{
		$this->dataSaida = $_dataSaida;
	}
}

?>