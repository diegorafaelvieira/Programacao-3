<?php
    
    class Serie extends Producao {
        private $numeroDeTemporadas;

        function getNumeroDeTemporadas() {
            return $this->numeroDeTemporadas;
        }
    
        function setNumeroDeTemporadas($_numeroDeTemporadas) {
            $this->numeroDeTemporadas = $_numeroDeTemporadas;
        }
    }
?>