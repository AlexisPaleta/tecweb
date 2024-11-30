<?php
    namespace myapi; // Se declara el namespace de la clase
    abstract class Database { // Clase abstracta para la conexión a la base de datos
        protected $conexion;

        // Constructor de la clase, recibe como parametros los datos de la conexión
        public function __construct($usuario, $contrasena, $baseDatos) {
            // Es impórtante la forma en la que creo la conexion, ya que trate de hacerlo antes
            // con new mysqli() y no funcionaba, por lo que opte por hacerlo de esta forma
            $this->conexion = @mysqli_connect(
                'localhost',
                $usuario,
                $contrasena,
                $baseDatos
            );
            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }
    }
?>