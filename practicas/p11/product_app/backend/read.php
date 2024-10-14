<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['consulta']) ) {
        $consulta = $_POST['consulta'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $conexion->query("SELECT * FROM `productos` WHERE nombre like '%{$consulta}%' or detalles like '%{$consulta}%' or marca like '%{$consulta}%'") ) {//Aqui se hace de esta manera
            //la consulta, pero lo mejor no seria hacerlo asi, ya que es poco seguro, puede sufirir de inyeccion sql, entonces lo mejor seria hacerlo de la siguiente manera
            // $stmt = $conexion->prepare("SELECT * FROM `productos` WHERE nombre like ? or detalles like ?"); en donde los signos de interrogacion son los parametros que se van a pasar
            // $stmt->bind_param("ss", $consulta, $consulta); //aqui se pasan los parametros, se pone una letra s por cada parametro que se va a pasar, en este caso son dos, y es
            //especificamente la letra "s" porque son strings, si fueran numeros se pondria "i" y si fueran decimales "d", tambien hay otro que se llama "b" que es para binarios, como
            //imagenes, etc.
            // $stmt->execute(); //aqui se ejecuta la consulta, que realizaria la busqueda de la consulta establecida
            // $result = $stmt->get_result(); //aqui se obtiene el resultado de la consulta
            // SE OBTIENEN LOS RESULTADOS
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE AGREGAN AL ARREGLO DE RESPUESTA
                $producto = array();
                foreach ($row as $key => $value) {
                    $producto[$key] = $value;
                }
                $data[] = $producto; // SE AGREGA CADA PRODUCTO AL ARREGLO PRINCIPAL, al usar los corchetes solitos se agregan de manera dinamica
            }

            // VERIFICAR SI NO SE ENCONTRARON RESULTADOS
            if (empty($data)) {
                $data['error'] = 'No se encontraron resultados';
            }
            
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>