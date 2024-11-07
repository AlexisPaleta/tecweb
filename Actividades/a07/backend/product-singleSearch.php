<?php
    
    require_once __DIR__ . '/Products.php';
    use Actividades\backend\Products as Products;

    $products = new Products("root", "cursodbAPO11?", "marketzone");

    if(isset($_POST['nombre'])) {
        $products->singleSearch($_POST);
    }

    echo $products->getData();

?>