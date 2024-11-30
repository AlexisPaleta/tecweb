<?php
    require_once '../vendor/autoload.php';

    use myapi\Read as Read;
    use myapi\Create as Create;
    use myapi\Delete as Delete;
    use myapi\Update as Update;
    
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

    $app->post('/edit', function($request, $response, $args){
        $response = $response->withHeader('Content-Type', 'application/json; charset=utf-8'); //Para los acentos

        $products = new Update("root", "cursodbAPO11?", "marketzone");

        $reqPost = $request->getParsedBody();

        if(isset($reqPost['id'])) {
            $products->edit($reqPost);
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

    $app->get('/search', function($request, $response, $args){
        $response = $response->withHeader('Content-Type', 'application/json; charset=utf-8'); //Para los acentos

        $products = new Read("root", "cursodbAPO11?", "marketzone");

        $queryParams = $request->getQueryParams();

        if(isset($queryParams['search'])) {
            $products->search($queryParams['search']);
        }

        $response->getBody()->write(json_encode($products->getData()));
        return $response;
    });

    $app->post('/single', function($request, $response, $args){
        $response = $response->withHeader('Content-Type', 'application/json; charset=utf-8'); //Para los acentos

        $products = new Read("root", "cursodbAPO11?", "marketzone");

        $reqPost = $request->getParsedBody();

        if(isset($reqPost['id'])) {
            $products->single($reqPost['id']);
        }

        $response->getBody()->write(json_encode($products->getData()));
        return $response;
    });

    $app->post('/singleSearch', function($request, $response, $args){
        $response = $response->withHeader('Content-Type', 'application/json; charset=utf-8'); //Para los acentos

        $products = new Read("root", "cursodbAPO11?", "marketzone");

        $reqPost = $request->getParsedBody();

        if(isset($reqPost['nombre'])) {
            $products->singleSearch($reqPost);
        }

        $response->getBody()->write(json_encode($products->getData()));
        return $response;
    });

    $app->run();
?>