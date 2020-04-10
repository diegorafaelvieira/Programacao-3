<?php
    
    class Diretor extends Pessoa {
        private $reconhecimento;

        function getReconhecimento() {
            return $this->reconhecimento;
        }
    
        function setReconhecimento($_reconhecimento) {
            $this->reconhecimento = $_reconhecimento;
        }
        
    }
?>