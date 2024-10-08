<?php
$config = parse_ini_file('../../config.ini', true);
$data = array();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];

    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', $config['database']['user'], $config['database']['password'], 'marketzone');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

    /** comprobar la conexión */
    if ($link->connect_errno) 
    {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
        //exit();
    }
    // Ejecuta la actualizacion del registro
    $sql = "UPDATE productos SET 
        nombre = '$nombre',
        marca = '$marca',
        modelo = '$modelo',
        precio = '$precio',
        detalles = '$detalles',
        unidades = '$unidades',
        imagen = '$imagen'
        WHERE id = '$id'";
        
    if(mysqli_query($link, $sql)){
    echo "Registro actualizado.";
    } else {
    echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
    }
    // Cierra la conexion
    mysqli_close($link);
?>