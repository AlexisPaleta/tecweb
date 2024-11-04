<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 7 PHP</title>
</head>
<body>
    <?php
        include_once __DIR__ . '/Cabecera.php';
        
        $cab1 = new Cabecera("El rincon del programador");
        $cab1->graficar();

        echo '<br>';

        $cab1 = new Cabecera("El rincon del programador","left");
        $cab1->graficar();

        echo '<br>';

        $cab1 = new Cabecera("El rincon del programador","center",'blue');
        $cab1->graficar();

        echo '<br>';

        $cab1 = new Cabecera("El rincon del programador","center",'pink','red');
        $cab1->graficar();
    ?>
    
</body>
</html>