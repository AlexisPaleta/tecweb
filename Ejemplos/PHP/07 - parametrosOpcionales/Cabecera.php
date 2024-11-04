<?php
    class Cabecera {
        private $titulo;
        private $ubicacion;
        private $colorFuente;
        private $colorFondo;

        public function __construct($title, $location='center',$cfont='#FFF',$cback='green'){
            $this->titulo = $title;
            $this->ubicacion = $location;
            $this->colorFuente = $cfont;
            $this->colorFondo = $cback;
        }

        public function graficar(){
            $estilo = 'font-size: 40px; text-align: '.$this->ubicacion.'; color:'.$this->colorFuente.'; background-color:'.$this->colorFondo;
            echo '<div style="'.$estilo.'">';
            echo '<h4>'.$this->titulo.'</h4>';
            echo '</div>';
        }
        
    }
?>