<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get('/', function () {
    return redirect('/api/documentation');
});
