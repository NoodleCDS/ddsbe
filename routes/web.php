<?php
/** @var \Laravel\Lumen\Routing\Router $router */
/*
|---------------------------------------------------------------------
-----
| Application Routes
|---------------------------------------------------------------------
-----
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
return $router->app->version();
});
//Basically the regular response.
$router->group(['prefix' => 'api'], function () use ($router) {
$router->get('/users',['uses' => 'UserController@getUsers']);
});

//NEW Eloquent style
$router->get('/users', 'UserController@index');//Show all
$router->post('/users', 'UserController@addUser');//INSERT new user
$router->get('/users/{id}', 'UserController@show');//SEARCH by ID
$router->put('/users/{id}', 'UserController@update');//UPDATES existing information
$router->patch('/users/{id}', 'UserController@update');//UPDATES SELECTED INFO
$router->delete('/users/{id}', 'UserController@delete');//delet

//ACCESS LOGIN
$router->get('login', 'UserController@showlogin');//LOHGUIN
$router->post('validate', 'UserController@result');//Checksum for data