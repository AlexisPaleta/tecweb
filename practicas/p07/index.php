<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 07</title>
</head>
<body>
    <h2>Primeros 4 ejercicios:</h2>
    <?php 
        include("src/funciones.php"); //Se agrega el archivo de funciones.php, lo que hace que ahora
        //dichas funciones esten ahora disponibles aqui en el index
    ?>
    <p>1.- Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method = "GET">
        <label>Ingresa un número para ver si es Múltiplo de 5 y 7: <input type="number" name="numero" min="0"></label>
        <br>
        <label>Ingresa un número para obtener otro aleatorio que sea múltiplo de este: <input type="number" name="numeroM" min="0"></label>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if(isset($_GET['numero']))
        {
            echo "<h2>Ejercicio 1</h2>";
            echo "<h3>";
            Multiplo(); //Se manda a llamar a una de las funciones del archivo de funciojes.php
            echo"</h3>";
            echo "<br>";
            echo "<h2>Ejercicio 2</h2>";
            echo "<h3>";
            Aleatorios();
            echo"</h3>";
            
        }
    ?>

<?php
        if(isset($_GET['numeroM']))
        {   
            echo "<br>";
            echo "<h2>Ejercicio 3 version 1: CICLO WHILE</h2>";
            echo "<h3>";
            Ejercicio3v1();
            echo"</h3>";
            echo "<br>";
            echo "<h2>Ejercicio 3 version 2: CICLO DO WHILE</h2>";
            echo "<h3>";
            Ejercicio3v2();
            echo"</h3>";
            
        }
    ?>

    <?php
        echo "<h2>Ejercicio 4</h2>";
        echo "<h3>";
        Ascii();
        echo"</h3>";
    ?>

    <h2>Ejercicio 5:</h2>
    <form action="http://localhost/tecweb/practicas/p07/src/ejercicio5.php" method="post">
        <label>Sexo: 
            <select name="sexo">
                <option value="femenino">Femenino</option>
                <option value="masculino">Masculino</option>
            </select>
        </label>
        <br>
        <label>Edad: <input type="number" name="edad" min="0" max="120"></label>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <h2>Ejercicio 6:</h2>
    <br>
    <?php 
        include("src/ejercicio6.php");
    ?>
    

        

</body>
</html>