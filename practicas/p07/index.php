<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 07</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <?php 
        include("src/funciones.php");
    ?>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method = "GET">
        <label>Ingresa un número: <input type="number" name="numero"></label>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if(isset($_GET['numero']))
        {
            echo "<h3>";
            Multiplo();
            echo"</h3>";
        }
    ?>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>

        

</body>
</html>