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

use GuzzleHttp\Client;

$router->group([
    'prefix' => 'api',
    'middleware' => ['json.response'],
    'namespace' => 'Api'
], function () use ($router) {

    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('posts', 'PostController@getPosts');

    $router->get('posts/{id}', 'PostController@get');

    $router->get('posts/{postId}/comments', 'CommentController@getForPost');

});
