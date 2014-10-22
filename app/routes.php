<?php

use packages\Tres\core\Route;

Route::add('/', array(
    'uses' => 'HomeController@renderPage',
    'as' => 'home'
));

Route::add('/users/:username/', array(
    'uses' => 'UserController@getProfile',
    'as' => 'profile-page'
));

// Errors
Route::add('error-404/', array(
    'uses' => 'ErrorNotFoundController@renderPage',
    'as' => 'error-404'
));
