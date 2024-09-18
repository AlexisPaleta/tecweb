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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <th scope="row"><?= $producto['id'] ?></th>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['marca'] ?></td>
                        <td><?= $producto['modelo'] ?></td>
                        <td><?= $producto['precio'] ?></td>
                        <td><?= $producto['unidades'] ?></td>
                        <td><?= $producto['detalles'] ?></td>
                        <td><img src="<?= $producto['imagen'] ?>" alt="Imagen del producto"></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php elseif(!empty($tope)) : ?>
            <script>
                alert('No hay productos que cumplan con la condición');
            </script>
        <?php endif; ?>
	</body>
</html>