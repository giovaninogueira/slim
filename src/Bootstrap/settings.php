<?php

    namespace Config\Bootstrap;

    use Config\Handlers\Handler;
    use Slim\App;

    static $app = null;

    if(!$app) {
        $app = new App([
            'settings' => [
                'determineRouteBeforeAppMiddleware' => false,
                'outputBuffering' => false,
                'displayErrorDetails' => true,
                'db' => [
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'database' => 'world',
                    'username' => 'root',
                    'password' => '123.',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
                ]
            ],
        ]);
    }

    $container = $app->getContainer();
    $capsule = new \Illuminate\Database\Capsule\Manager();
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    $capsule->getContainer()->singleton(
        \Illuminate\Contracts\Debug\ExceptionHandler::class,
        Handler::class
    );
