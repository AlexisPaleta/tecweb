<?php
    require_once '../vendor/autoload.php';

    use myapi\Read as Read;
    use myapi\Create as Create;
    use myapi\Delete as Delete;
    
    $app = new Slim\App();

    $app->get('/list', function($request, $response, $args){
        $response = $response->withHeader('Content-Type', 'application/json; charset=utf-8'); //Para los acentos

        $products = new Read("root", "cursodbAPO11?", "marketzone");

        $products->list();

        $response->getBody()->write(json_encode($products->getData()));
        return $response;
    });

    $app->post('/add', function($request, $response, $args){
        $response = $response->withHeader('Content-Type', 'application/json; charset=utf-8'); //Para los acentos

        $products = new Create("root", "cursodbAPO11?", "marketzone");

        $reqPost = $request->getParsedBody();

        if(isset($reqPost['nombre'])) {
            $products->add($reqPost);
        }

        $response->getBody()->write(json_encode($products->getData()));
        return $response;
    });

    $app->post('/delete', function($request, $response, $args){
        $response = $response->withHeader('Content-Type', 'application/json; charset=utf-8'); //Para los acentos

        $products = new Delete("root", "cursodbAPO11?", "marketzone");

        $reqPost = $request->getParsedBody();

        if(isset($reqPost['id'])) {
            $products->delete($reqPost['id']);
        }

        $response->getBody()->write(json_encode($products->getData()));
        return $response;
    });

    $app->get('/hola[/{nombre}]', function($request, $response, $args){
        $response->write('Hola, ' . $args["nombre"]);
        return $response;
    });

    $app->run();
?>