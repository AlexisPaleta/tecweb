<?php

    class Menu{
        private $opciones;
        private $direccion;

        public function __construct($dir){
            $this->direccion = $dir;
            $this->opciones = array();
        }

        public function insertar_opcion($op){
            $this->opciones[] = $op;
        }

        private function graficar_horizontal(){
            for($i = 0; $i < count($this->opciones); $i++){
                $this->opciones[$i]->graficar(); //Se incova al metodo del objeto opcion contenido en la 
                //posicion i del arreglo opciones
                echo ' - ';
            }
        }

        private function graficar_vertical(){
            for($i = 0; $i < count($this->opciones); $i++){
                $this->opciones[$i]->graficar(); //Se incova al metodo del objeto opcion contenido en la 
                //posicion i del arreglo opciones
                echo '<br>';
            }
        }

        public function graficar(){
            if($this->direccion === 'horizontal'){
                $this->graficar_horizontal();
            }else if($this->direccion === 'vertical'){
                $this->graficar_vertical();
            }
        }
    }
?>