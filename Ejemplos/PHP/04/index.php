<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/Tabla.php';

        $tab = new Tabla(2,3, 'border: 1px solid');
        $tab -> graficar();
    ?>
</body>
</html>