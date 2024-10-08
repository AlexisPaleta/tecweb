<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
	header('Content-Type: text/html; charset=UTF-8');
	// Lee el archivo de configuración, aqui puse mi contraseña y usuario
	$config = parse_ini_file('../../config.ini', true);

	if(isset($_GET['tope']))
    {
		$tope = $_GET['tope'];
    }
    else
    {
        die('Parámetro "tope" no detectado...');
    }

    $productos = [];

	if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', $config['database']['user'], $config['database']['password'], 'marketzone');

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
		}
		$link->set_charset("utf8mb4");
		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope") ) 
		{
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $productos[] = $row;
            }
			/** útil para liberar memoria asociada a un resultado con demasiada información */
            
			$result->free();
		}

		$link->close();
	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta charset="UTF-8">
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script>

            function prueba(){
                var rowId = event.target.parentNode.parentNode.id;

                // se obtienen los datos de la fila en forma de arreglo
                var data = document.getElementById(rowId).querySelectorAll(".row-data");
                for(i=0;i<7;i++){
                    console.log(data[i].innerHTML);
                }
                var imagen = data[6].querySelector('img').src;
                console.log("im " + imagen);
            }
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

                var nombre = data[0].innerHTML;
                var marca = data[1].innerHTML;
                var modelo = data[2].innerHTML;
                var precio = data[3].innerHTML;
                var detalles = data[4].innerHTML;
                var unidades = data[5].innerHTML;
                var imagen = data[6].querySelector('img').src;

                

                send2form(nombre, marca, modelo, precio, detalles, unidades, imagen);
            }
        </script>
    </head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		<?php if( !empty($productos) ) : ?>

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
                    <?php foreach ($productos as $producto) : ?>
                    <tr id="<?= $producto['id'] ?>">
                        <th scope="row"><?= $producto['id'] ?></th>
                        <td class="row-data"><?= $producto['nombre'] ?></td>
                        <td class="row-data"><?= $producto['marca'] ?></td>
                        <td class="row-data"><?= $producto['modelo'] ?></td>
                        <td class="row-data"><?= $producto['precio'] ?></td>
                        <td class="row-data"><?= $producto['detalles'] ?></td>
                        <td class="row-data"><?= $producto['unidades'] ?></td>
                        <td class="row-data"><img src="defecto.png" alt="Imagen del producto"></td>
                        <td><input type="button" 
                            value="Editar" 
                            onclick="show()" /></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <script>
                function send2form(nombre, marca, modelo, precio, detalles, unidades, imagen) {     //form) { 
                    var urlForm = "http://localhost/tecweb/practicas/p10/formulario_productos_v2.php";
                    var propName = "nombre=" + encodeURIComponent(nombre);
                    var propMarca = "marca=" + encodeURIComponent(marca);
                    var propModelo = "modelo=" + encodeURIComponent(modelo);
                    var propPrecio = "precio=" + encodeURIComponent(precio);
                    var propDetalles = "detalles=" + encodeURIComponent(detalles);
                    var propUnidades = "unidades=" + encodeURIComponent(unidades);
                    var propImagen = "imagen=" + encodeURIComponent(imagen);
                    window.open(urlForm+"?"+propName+"&"+propMarca+"&"+propModelo+"&"+propPrecio+"&"+propDetalles+"&"+propUnidades+"&"+propImagen);
                }
            </script>

        <?php elseif(!empty($tope)) : ?>
            <script>
                alert('No hay productos que cumplan con la condición');
            </script>
        <?php endif; ?>
	</body>
</html>