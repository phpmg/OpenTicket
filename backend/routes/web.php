<?php

use Illuminate\Routing\Router;
use App\Http\Controllers\Events\EventsController;
/** @var Router $router */

$router->get('/', function () {
    return view('welcome');
});

$router->group([
    'namespace' => 'Events',
    'prefix' => 'api'
], function () use ($router) {
    $router->group(['prefix' => 'events'], function () use ($router) {
        $router->get('/', [EventsController::class,"getEvents"]);
    });
});
