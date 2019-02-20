<?php

    namespace App\Routes;

    use App\Controllers;
    use Slim\Http\Request;
    use Slim\Http\Response;

    $app->get('/dev', function(Request $request, Response $response, $args) {
        return Controllers\DevController::select();
    });

    $app->get('/dev/{id}', function(Request $request, Response $response, $args) {
        return Controllers\DevController::selectBy($args['id']);
    });

    $app->post('/dev', function (Request $request, Response $response) {
        return Controllers\DevController::insert((object) $request->getParsedBody());
    });

    $app->put('/dev/{id}', function (Request $request, Response $response, $args) {
        return Controllers\DevController::update((object) $request->getParsedBody(), $args['id']);
    });

    $app->delete('/dev/{id}', function(Request $request, Response $response, $args) {
        return Controllers\DevController::delete($args['id']);
    });