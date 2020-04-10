<?php
    
    class Ator extends Pessoa {
        private $habilidades;

        public function getHabilidades()
        {
            return $this->habilidades;
        }
    
        public function setHabilidades($_habilidades)
        {
            $this->habilidades = $_habilidades;
        }
       
    }

?>