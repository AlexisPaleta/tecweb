<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 06</title>
</head>
<body>
    <?php
        require __DIR__ . '/Menu.php';
        require __DIR__ . '/Opcion.php';

        $menu = new Menu('vertical');

        $op1 = new Opcion('Facebook','https://www.facebook.com','#c4e');
        $op2 = new Opcion('Twitter','https://www.x.com','green');
        $op3 = new Opcion('Google','https://www.google.com','pink');

        $menu->insertar_opcion($op1);
        $menu->insertar_opcion($op2);
        $menu->insertar_opcion($op3);

        $menu->graficar();
    ?>
</body>
</html>