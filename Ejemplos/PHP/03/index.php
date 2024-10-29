<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 3 PHP</title>
</head>
<body>
    <?php
        use EJEMPLOS\POO\Cabecera2 as Cabecera;
        include_once __DIR__ . '/Cabecera.php';
        
        $cab1 = new Cabecera("El rincon del programador","center","https://www.facebook.com");
        $cab1->graficar();
    ?>
    
</body>
</html>