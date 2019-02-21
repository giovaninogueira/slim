<?php

    namespace App\Routes\Paths;

    use App\Controllers;
    use Slim\Http\Request;
    use Slim\Http\Response;

    $app->group('/dev', function () use ($app) {
        $app->get('/', function(Request $request, Response $response, $args) {
            return Controllers\DevController::select();
        });
        $app->get('/{id}', function(Request $request, Response $response, $args) {
            return Controllers\DevController::selectBy($args['id']);
        });
        $app->post('/', function (Request $request, Response $response) {
            return Controllers\DevController::insert((object) $request->getParsedBody());
        });
        $app->put('/{id}', function (Request $request, Response $response, $args) {
            return Controllers\DevController::update((object) $request->getParsedBody(), $args['id']);
        });
        $app->delete('/{id}', function(Request $request, Response $response, $args) {
            return Controllers\DevController::delete($args['id']);
        });
    });