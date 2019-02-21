<?php
    namespace App\Routes\Paths;

    use App\Controllers;
    use Slim\Http\Request;
    use Slim\Http\Response;

    $app->get('/User', function(Request $request, Response $response, $args) {
        return $response->withStatus(200)->write('Oláa');
    });
