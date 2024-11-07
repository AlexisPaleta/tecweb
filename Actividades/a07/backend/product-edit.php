<?php
    // include_once __DIR__.'/database.php';

    // // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    // $data = array(
    //     'status'  => 'error',
    //     'message' => 'La consulta falló'
    // );
    // // SE VERIFICA HABER RECIBIDO EL ID
    // if( isset($_POST['id']) ) {
    //     $jsonOBJ = json_decode( json_encode($_POST) );
    //     // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    //     $sql =  "UPDATE productos SET nombre='{$jsonOBJ->nombre}', marca='{$jsonOBJ->marca}',";
    //     $sql .= "modelo='{$jsonOBJ->modelo}', precio={$jsonOBJ->precio}, detalles='{$jsonOBJ->detalles}',"; 
    //     $sql .= "unidades={$jsonOBJ->unidades}, imagen='{$jsonOBJ->imagen}' WHERE id={$jsonOBJ->id}";
    //     $conexion->set_charset("utf8");
    //     if ( $conexion->query($sql) ) {
    //         $data['status'] =  "success";
    //         $data['message'] =  "Producto actualizado";
	// 	} else {
    //         $data['status'] =  "Error";
    //         $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
    //     }
	// 	$conexion->close();
    // } 
    
    // // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    // echo json_encode($data, JSON_PRETTY_PRINT);

    require_once __DIR__ . '/Products.php';
    use Actividades\backend\Products as Products;

    $products = new Products("root", "cursodbAPO11?", "marketzone");

    if(isset($_POST['id'])) {
        $products->edit($_POST);
    }

    echo $products->getData();
?>