<?php

/*
|------------------------------------------------------------------------------
| Main application routes
|------------------------------------------------------------------------------
| 
| This file is used to register all the routes for the main application. If 
| there are more applications to route to, importing them is the way to go.
| 
*/

Route::get('/', [
    'controller' => 'HomeController',
    'method' => 'renderPage',
    'alias' => 'home'
]);

Route::get('/about', [
    'alias' => 'about',
    function(){
        echo 'Tres Framework '.Tres\core\Version::get(true, true, true);
    }
]);

Route::get('/mail-test', [
    'alias' => 'mail-test',
    function(){
        $mail = new Mail(new MailConnection());
        
        $mail->isHTML();
        $mail->from = 'John Doe';
        $mail->to = 'john@example.com';
        $mail->subject = 'Test email!';
        $mail->body = '<h1>Test email</h1><b>HTML</b> is supported.';
        $mail->addHeader('X-IP-Address', $_SERVER['REMOTE_ADDR']);
        
        if($mail->send()){
            ?>
            <h1>Mail sent!</h1>
            The mail has been sent.<br />
            <?php
        } else {
            ?>
            <h1>Uh oh!</h1>
            An error occurred.<br />
            <?php
        }
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
