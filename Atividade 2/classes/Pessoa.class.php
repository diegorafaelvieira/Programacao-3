<?php

    class Pessoa {
        protected $nome;

        function getNome() {
            return $this->nome;
        }
    
        function setNome($_nome) {
            $this->nome = $_nome;
        }

       
    }
?>