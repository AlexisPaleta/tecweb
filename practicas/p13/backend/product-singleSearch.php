<?php
    
    require_once __DIR__ . '/Read.php';
    use Actividades\backend\Read as Read;

    $products = new Read("root", "cursodbAPO11?", "marketzone");

    if(isset($_POST['nombre'])) {
        $products->singleSearch($_POST);
    }

    echo $products->getData();

?>