<?php
    class Tabla {

        private $numFilas;
        private $estilo;
        private $columnas;

        public function __construct($rows, $colum, $style){
            $this -> numFilas = $rows;
            $this -> columnas = $colum;
            $this -> estilo = $style;
        }

        public function cargar(){

        }

        private function inicio_tabla(){
            echo '<table style ="'.$this->estilo.'">';
        }

        private function inicio_fila(){
            
        }

        private function fin_fila(){
            echo '</tr>';
        }

        private function fin_tabla(){
            echo '</table>';
        }

        public function graficar(){
            $this -> inicio_tabla();
            for ($i=0; $i < $this -> numFilas ; $i++) { 
                # code...
            }
        }
    }
?>
