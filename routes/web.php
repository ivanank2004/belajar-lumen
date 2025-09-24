<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return $router->app->version();
});

$router->get('login', 'LoginController@index');

$router->group( ['prefix' => 'api', 'middleware' => 'user'], function() use ($router){
    //kategori
    $router->get('/kategori','KategoriController@index');
    $router->get('/kategori/{id}','KategoriController@show');

    $router->post('/kategori/{id}','KategoriController@update');
    $router->post('/kategori','KategoriController@create');

    $router->delete('/kategori/{id}', 'KategoriController@destroy');

    //pelanggan
    $router->get('/pelanggan','PelangganController@index');
    $router->get('/pelanggan/{id}','PelangganController@show');

    $router->post('/pelanggan','PelangganController@create');

    $router->put('/pelanggan/{id}','PelangganController@update');

    //menu
    $router->get('/menu','MenuController@index');

    $router->post('/menu','MenuController@create');
} );
