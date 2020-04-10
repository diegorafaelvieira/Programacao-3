<?php

    class Producao {
        protected $nome;
        protected $atorPrincipal;
        protected $diretor;
       
        function getNome() {
            return $this->nome;
        }
    
        function setNome($_nome) {
            $this->nome = $_nome;
        }

        function getAtorPrincipal() {
            return $this->atorPrincipal;
        }
    
        function setAtorPrincipal($_atorPrincipal) {
            $this->atorPrincipal = $_atorPrincipal;
        }

        function getDiretor() {
            return $this->diretor;
        }
    
        function setDiretor($_diretor) {
            $this->diretor = $_diretor;
        }
    }

?>