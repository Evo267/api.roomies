<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response()->json([
        'it works'
    ]);
});

$router->post('auth/login', ['uses' => 'AuthController@authenticate']);

$router->group(['middleware' => 'jwt.auth'], function() use ($router) {

    $router->get('users', function() {
        $users = \App\User::all();
        return response()->json($users);
    });

});


$router->get('/key', function() {
    return str_random(32);
});