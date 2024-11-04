<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 2 PHP</title>
</head>
<body>
    <?php
        include_once __DIR__ . '/Menu.php';

        $men1 = new Menu();
        $men1->cargar_opcion("https://www.facebook.com","Facebook");
        $men1->cargar_opcion("https://www.x.com","Twitter");
        $men1->cargar_opcion("https://www.instagram.com","Instagram");
        $men1->mostrar();

    ?>
</body>
</html>