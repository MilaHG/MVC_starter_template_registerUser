<?php
session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';

// instance of the Router
$router = new App\Router($_SERVER['REQUEST_URI']);


/**
 * Routes of the application $_GET
 */
// homepage
$router->get('/', "UserController@index");

// register user
$router->get('/user/register/', "UserController@getFormRegisterUser");


/**
 * Routes of the application $_POST
 */
// register user
$router->post('/user/register/', "UserController@registerUser");

try {
    $router->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
