<?php
    namespace myapi;

    use myapi\Database as DataBase; 
    require_once __DIR__ . '/DataBase.php';

    class Delete extends Database{
        private $data;

        public function __construct($usuario, $contrasena, $baseDatos){
            // Se llama al constructor de la clase padre, que crea la conexión a la base de datos
            parent::__construct($usuario, $contrasena, $baseDatos); 
            $this->data = array();
        }

        public function delete($id){
            // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
            $data = array(
                'status'  => 'error',
                'message' => 'La consulta falló'
            );

            $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
            if ( $this->conexion->query($sql) ) {
                $data['status'] =  "success";
                $data['message'] =  "Producto eliminado";
            } else {
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();

            // SE HACE LA CONVERSIÓN DE ARRAY A JSON
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }

        public function getData(){
            return $this->data;
        }
        
    }
?>