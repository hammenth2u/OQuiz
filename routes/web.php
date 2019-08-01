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

$router->get('/', [
    'as' => 'home',
    'uses' => 'MainController@home'
]);


$router->get('/quiz/[id]', [
    'as' => 'quiz',
    'uses' => 'QuizController@quiz'
]);

$router->get('/quiz/[id]', [
    'as' => 'quizPost',
    'uses' => 'QuizController@quizPost'
]);


$router->get('/signup', [
    'as' => 'signup',
    'uses' => 'UserController@signup'
]);

$router->post('/signup', [
    'as' => 'signupPost',
    'uses' => 'UserController@signupPost'
]);

$router->get('/signin', [
    'as' => 'signin',
    'uses' => 'UserController@signin'
]);

$router->post('/signin', [
    'as' => 'signinPost',
    'uses' => 'UserController@signinPost'
]);

$router->get('/logout', [
    'as' => 'logout',
    'uses' => 'UserController@logout'
]);

$router->get('/account', [
    'as' => 'account',
    'uses' => 'UserController@profile'
]);

$router->get('/tags', [
    'as' => 'tags',
    'uses' => 'TagController@tags'
]);

$router->get('/tags/[id]/quiz', [
    'as' => 'tagsQuiz',
    'uses' => 'TagController@quiz'
]);
