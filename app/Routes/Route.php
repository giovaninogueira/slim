<?php

    namespace App\Routes;

    $path    = __DIR__ . '/Paths';
    $routes = array_diff(
        scandir($path),
        array('.', '..')
    );
    foreach ($routes as $index => $route) {
        require_once __DIR__ . '/Paths/' . $route;
    }