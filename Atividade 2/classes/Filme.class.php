<?php
    
    class Filme extends Producao {
        private $ano;
        private $duracao;

        function getAno() {
            return $this->ano;
        }
    
        function setAno($_ano) {
            $this->ano = $_ano;
        }

        function getDuracao() {
            return $this->duracao;
        }
    
        function setDuracao($_duracao) {
            $this->duracao = $_duracao;
        }
      
    }
?>