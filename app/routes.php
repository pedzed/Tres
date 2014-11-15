<?php

Route::get('/', [
    'controller' => 'HomeController',
    'method' => 'renderPage',
    'alias' => 'home'
]);

Route::get('/info', [
    'alias' => 'info',
    function(){
        echo '<h1>INFO!</h1>';
    }
]);

Route::get('/users/:username/', [
    'controller' => 'UserController',
    'method' => 'getProfile'
]);

Route::notFound([
    'controller' => 'ErrorNotFoundController',
    'method' => 'renderPage',
    'alias' => 'error-404'
]);
