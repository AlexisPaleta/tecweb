<?php
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];

$config = parse_ini_file('../../config.ini', true);

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', $config['database']['user'], $config['database']['password'], 'marketzone');

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

if ( $result = $link->query("SELECT * FROM productos WHERE nombre='{$nombre}' and marca='{$marca}' and modelo='{$modelo}';") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			if($result->num_rows > 0){
                echo "<h1>ERROR: YA HAY DATOS REGISTRADOS CON ESE NOMBRE-MARCA-MODELO</h1>";
            }else{

                $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
                if ( $link->query($sql) ) 
                {
                }
                else
                {
                    echo 'El Producto no pudo ser insertado =(';
                }

                echo "<h1>Los Datos ingredados fueron:</h1>";
                echo "<p>Nombre: $nombre</p>";
                echo "<p>Marca: $marca</p>";
                echo "<p>Modelo: $modelo</p>";
                echo "<p>Precio: $precio</p>";
                echo "<p>Detalles: $detalles</p>";
                echo "<p>Unidades: $unidades</p>";
                echo "<p>Imagen: $imagen</p>";
            }
		}

/** Crear una tabla que no devuelve un conjunto de resultados */
//$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
//if ( $link->query($sql) ) 
//{
 //   echo 'Producto insertado con ID: '.$link->insert_id;
//}
//else
//{
//	echo 'El Producto no pudo ser insertado =(';
//}

$link->close();
?>