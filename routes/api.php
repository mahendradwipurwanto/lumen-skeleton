<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return response()->success(["Hello World!"], "success", 202);
});

$router->group(['prefix' => 'v1'], function (Router $router) {
    $router->get('/', function () use ($router) {
        return response()->success(["Hello World!"], "success", 200);
    });
});
