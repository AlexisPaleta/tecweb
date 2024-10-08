<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
    //header("Content-Type: application/json; charset=utf-8"); 
    $config = parse_ini_file('../../config.ini', true);
    $data = array();

		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', $config['database']['user'], $config['database']['password'], 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			//exit();
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE eliminado <> '1'") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = ($value);
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();

        /** Se devuelven los datos en formato JSON */
        //echo json_encode($data, JSON_PRETTY_PRINT);
	
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script>

            function show() {
                // se obtiene el id de la fila donde está el botón presinado
                var rowId = event.target.parentNode.parentNode.id;

                // se obtienen los datos de la fila en forma de arreglo
                var data = document.getElementById(rowId).querySelectorAll(".row-data");
                /**
                querySelectorAll() devuelve una lista de elementos (NodeList) que 
                coinciden con el grupo de selectores CSS indicados.
                (ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

                En este caso se obtienen todos los datos de la fila con el id encontrado
                y que pertenecen a la clase "row-data".
                */
				var id = rowId;
                var nombre = data[0].innerHTML;
                var marca = data[1].innerHTML;
                var modelo = data[2].innerHTML;
                var precio = data[3].innerHTML;
                var detalles = data[4].innerHTML;
                var unidades = data[5].innerHTML;
                var imagen = data[6].querySelector('img').src;

                

                send2form(nombre, marca, modelo, precio, detalles, unidades, imagen, id);
            }
        </script>
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		<?php if( isset($row) ) : ?>
			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">Edicion</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($row as $value) : ?>
					<tr id="<?= $value['id'] ?>">
						<th scope="row"><?= $value['id'] ?></th>
						<td class="row-data"><?= $value['nombre'] ?></td>
						<td class="row-data"><?= $value['marca'] ?></td>
						<td class="row-data"><?= $value['modelo'] ?></td>
						<td class="row-data"><?= $value['precio'] ?></td>
						<td class="row-data"><?= $value['detalles'] ?></td>
						<td class="row-data"><?= $value['unidades'] ?></td>
						<td class="row-data"><img src=<?= $value['imagen'] ?> ></td>
						<td><input type="button" 
                            value="Editar" 
                            onclick="show()" /></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		<?php endif; ?>
		<script>
                function send2form(nombre, marca, modelo, precio, detalles, unidades, imagen, id) {     //form) { 
                    var urlForm = "http://localhost/tecweb/practicas/p10/formulario_productos_v2.php";
                    var propId = "id=" + encodeURIComponent(id);
                    var propName = "nombre=" + encodeURIComponent(nombre);
                    var propMarca = "marca=" + encodeURIComponent(marca);
                    var propModelo = "modelo=" + encodeURIComponent(modelo);
                    var propPrecio = "precio=" + encodeURIComponent(precio);
                    var propDetalles = "detalles=" + encodeURIComponent(detalles);
                    var propUnidades = "unidades=" + encodeURIComponent(unidades);
                    var propImagen = "imagen=" + encodeURIComponent(imagen);
                    window.open(urlForm+"?"+propId+"&"+propName+"&"+propMarca+"&"+propModelo+"&"+propPrecio+"&"+propDetalles+"&"+propUnidades+"&"+propImagen);
                }
            </script>
	</body>
</html>