<?php
    namespace Actividades\backend;

    
    use Actividades\backend\Database as DataBase; 
    require_once __DIR__ . '/DataBase.php';// Se importa la clase Database, el formato es asi
    //debido a que se esta usando namespace en la clase Database
    
    class Products extends DataBase{
        private $data;

        public function __construct($usuario, $contrasena, $baseDatos){
            // Se llama al constructor de la clase padre, que crea la conexión a la base de datos
            parent::__construct($usuario, $contrasena, $baseDatos); 
            $this->data = array();
        }

        public function add($JSON){
            // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
            $data = array(
                'status'  => 'error',
                'message' => 'Ya existe un producto con ese nombre'
            );

                // SE TRANSFORMA EL POST A UN STRING EN JSON, Y LUEGO A OBJETO
                $jsonOBJ = json_decode( json_encode($JSON));
                // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
                $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
                $result = $this->conexion->query($sql);
                
                if ($result->num_rows == 0) {
                    $this->conexion->set_charset("utf8");
                    $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
                    if($this->conexion->query($sql)){
                        $data['status'] =  "success";
                        $data['message'] =  "Producto agregado";
                    } else {
                        $data['status'] =  "error";
                        $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                    }
                }else{
                    $data['status'] =  "error";
                    $data['message'] = "Ya existe un producto con ese nombre";
                }

                $result->free();
                // Cierra la conexion
                $this->conexion->close();

                $this->data = json_encode($data, JSON_PRETTY_PRINT);

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

        public function edit($JSON){
            // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
            $data = array(
                'status'  => 'error',
                'message' => 'La consulta falló'
            );

            $jsonOBJ = json_decode( json_encode($JSON) );

            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql =  "UPDATE productos SET nombre='{$jsonOBJ->nombre}', marca='{$jsonOBJ->marca}',";
            $sql .= "modelo='{$jsonOBJ->modelo}', precio={$jsonOBJ->precio}, detalles='{$jsonOBJ->detalles}',"; 
            $sql .= "unidades={$jsonOBJ->unidades}, imagen='{$jsonOBJ->imagen}' WHERE id={$jsonOBJ->id}";
            $this->conexion->set_charset("utf8");
            if ( $this->conexion->query($sql) ) {
                $data['status'] =  "success";
                $data['message'] =  "Producto actualizado";
            } else {
                $data['status'] =  "Error";
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();

            // SE HACE LA CONVERSIÓN DE ARRAY A JSON
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }

        public function list(){
            // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
            $data = array();

            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            if ( $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0") ) {
                // SE OBTIENEN LOS RESULTADOS
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                if(!is_null($rows)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach($rows as $num => $row) {
                        foreach($row as $key => $value) {
                            $data[$num][$key] = $value;
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: '.mysqli_error($this->conexion));
            }
            $this->conexion->close();
            
            // SE HACE LA CONVERSIÓN DE ARRAY A JSON
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }

        public function search($search){
            // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
            $data = array();

            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
            if ( $result = $this->conexion->query($sql) ) {
                // SE OBTIENEN LOS RESULTADOS
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                if(!is_null($rows)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach($rows as $num => $row) {
                        foreach($row as $key => $value) {
                            $data[$num][$key] = $value;
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: '.mysqli_error($this->conexion));
            }
            $this->conexion->close();

            // SE HACE LA CONVERSIÓN DE ARRAY A JSON
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }

        public function single($id){
            // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
            $data = array();

            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            if ( $result = $this->conexion->query("SELECT * FROM productos WHERE id = {$id}") ) {
                // SE OBTIENEN LOS RESULTADOS
                $row = $result->fetch_assoc();

                if(!is_null($row)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach($row as $key => $value) {
                        $data[$key] = $value;
                    }
                }
                $result->free();
            } else {
                die('Query Error: '.mysqli_error($this->conexion));
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