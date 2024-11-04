<?php
    class Cuerpo{
        private $lineas = NULL;

        public function __construct(){
            $this->lineas = array();
        }

        public function insertar_parrafo($line){
            $this->lineas[] = $line; //Los corchetes hacen que se se agregue al final del arreglo, asi no es necesario indicar la pocision
        }

        public function graficar(){
            for($i = 0; $i < count($this->lineas); $i++){
                echo '<p>'.$this->lineas[$i].'</p>';
            }
        }
    }
?>