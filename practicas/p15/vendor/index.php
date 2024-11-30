<?php
    require_once 'autoload.php';
    
    $app = new Slim\App();

    $app->get('/', function($request, $response, $args){
        $response->write('Hola Mundo Slim!!');
        return $response;
    });

    $app->get('/hola[/{nombre}]', function($request, $response, $args){
        $response->write('Hola, ' . $args["nombre"]);
        return $response;
    });

    $app->post('/pruebapost', function($request, $response, $args){
        $reqPost = $request->getParsedBody();
        $val1 = $reqPost['val1'];
        $val2 = $reqPost['val2'];

        $response->write('Valores: ' . $val1 . " " . $val2);
        return $response;
    });

    $app->get('/testjson', function($request, $response, $args){
        $data[0]["nombre"] = "Alexis";
        $data[0]["apellidos"] = "Paleta Osorio";
        $data[1]["nombre"] = "Juan";
        $data[1]["apellidos"] = "González Pérez";
        $response = $response->withHeader('Content-Type', 'application/json; charset=utf-8'); //Para los acentos
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return $response;
    });

    $app->run();
?>