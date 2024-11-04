<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herencia</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/Operacion.php';

        $suma = new Suma(1,12); //La clase de suma hereda el constructor de Operacion.php
        $resta = new Resta(4,20);

        //$suma->setValor1(1); //Metodo definido en la clase operacion
        //$suma->setValor1(29);
        $suma->operar(); //Metodo definido en la clase suma
        $resta->operar();

        echo 'El resultado es: '.$suma->getResultado().'<br>';
        echo 'El resultado es: '.$resta->getResultado().'<br>';
    ?>
</body>
</html>