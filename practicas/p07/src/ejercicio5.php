<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta del ejercicio 5</title>
</head>
<body>
    <?php
        $edad = $_POST["edad"];
        $sexo = $_POST["sexo"];
        if(($edad<= 35 && $edad >= 18) && $sexo == "femenino"){
            echo "<h1>Bienvenida, usted está en el rango de edad permitido.</h1>";
        }else{
            echo "<h1>Lo sentimos, usted no puede tener acceso.</h1>";
        }
    ?>
</body>
</html>