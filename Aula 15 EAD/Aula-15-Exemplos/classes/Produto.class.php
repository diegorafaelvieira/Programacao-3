<?php

class Produto {
	
	public $codigo;
	public $descricao;
	public $preco;
	public $quantidade;
     
	function imprimir() {
	    echo "Codigo:".$this->codigo."<br/>\r\n";
	    echo "Descricao:".$this->descricao."<br/>\r\n";
	}
	
	function getCodigo() {
	    return $this->codigo;
	}
	
	function setCodigo($novo_codigo) {
	    $this->codigo = $novo_codigo;
	}
	
	function imprimirDestacado() {
		echo "<br/>\r\n";
		echo "<p><span style=\"background-color:#66EE66\">";
		echo $this->codigo.", ";
		echo $this->descricao.", ";
		echo $this->preco.", ";
		echo $this->quantidade.".";
		echo "</span></p>";
	}
}

?>