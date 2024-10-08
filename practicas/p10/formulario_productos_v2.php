<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegistrarProductos</title>
    <link rel="stylesheet" href="css/styless.css">
    
</head>
<body>
    <h1>Formulario para el registro de Productos</h1>
    
    <div class="contenedor">
        <form action="" method="post" id="formulario">  
                <div class="inputContainer">
                    <label>Nombre del producto: <input type="text" name="nombre" placeholder="Termo..." id="nombre" value="<?= $_GET['nombre'] ?>" required> </label>
                    <p class="error" id="nom"></p>
                </div>

                <div class="inputContainer">
                    <label>Marca del producto:</label> 
                    <select name="marca" id="opcionesMarca">
                        <option value=""></option>
                        <option value="Sabritas" <?= (isset($_GET['marca']) && $_GET['marca'] == "Sabritas") ? 'selected' : '' ?>>Sabritas</option>
                        <option value="Takis" <?= (isset($_GET['marca']) && $_GET['marca'] == "Takis") ? 'selected' : '' ?>>Takis</option>
                        <option value="Chips" <?= (isset($_GET['marca']) && $_GET['marca'] == "Chips") ? 'selected' : '' ?>>Chips</option>
                        <option value="Cheetos" <?= (isset($_GET['marca']) && $_GET['marca'] == "Cheetos") ? 'selected' : '' ?>>Cheetos</option>
                        <option value="Doritos" <?= (isset($_GET['marca']) && $_GET['marca'] == "Doritos") ? 'selected' : '' ?>>Doritos</option>
                        <option value="Ruffles" <?= (isset($_GET['marca']) && $_GET['marca'] == "Ruffles") ? 'selected' : '' ?>>Ruffles</option>
                    </select> 
                    <p class="error" id="mar"></p>
                </div>
                
                <div class="inputContainer">
                    <label>Modelo del producto: <input type="text" name="modelo" placeholder="HG092..." id="modelo" value="<?= $_GET['modelo'] ?>" required> </label>
                    <p class="error" id="mod"></p>
                </div>
                
                <div class="inputContainer">
                    <label>Precio del producto: <input type="number" name="precio" min="0" id="precio" value="<?= $_GET['precio'] ?>" required></label>
                    <p class="error" id="pre"></p>
                </div>

                <div class="inputContainer">
                    <label>Detalles del producto: <textarea name="detalles" placeholder="El producto presenta..." id="detalles" maxlength="250"><?= $_GET['detalles'] ?></textarea></label>
                    <p class="error" id="det"></p>
                </div>

                <div class="inputContainer">
                    <label>Unidades del producto: <input type="number" name="unidades" min="0" id="unidades" value="<?= $_GET['unidades'] ?>" required></label>
                    <p class="error" id="uni"></p>
                </div>

                <div class="inputContainer">
                    <label>Imagen del producto: <input type="text" name="imagen" placeholder="img/img.png..." id="imagen" value="<?= $_GET['imagen'] ?>"> </label>
                </div>

                <div class="contenedorBoton">
                    <input type="submit" value="Registrar Producto">
                    <p class="error"></p>
                </div>
        </form>
    </div>
    <script src="src/validacioness.js"></script>
</body>
</html>