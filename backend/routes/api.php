<?php

use Illuminate\Routing\Router;
use App\Http\Controllers\Events\EventsController;
use App\Http\Controllers\Users\UserController;

/** @var Router $router */

$router->group(['prefix' => 'events'], function () use ($router) {
    $router->get('/', [EventsController::class, "getEvents"]);
});
$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/auth', [UserController::class, "auth"]);
    $router->post('/sign-on', [UserController::class, "signOn"]);
});
