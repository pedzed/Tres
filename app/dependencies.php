<?php

/*
|------------------------------------------------------------------------------
| Dependency manifest
|------------------------------------------------------------------------------
| 
| This file is used to register dependencies. These dependencies will be 
| automatically loaded.
| 
*/
return [
    
    /*
    |--------------------------------------------------------------------------
    | Namespaces
    |--------------------------------------------------------------------------
    | 
    | All namespaces should be registered here. Note that you do not have to 
    | be too specific. The files will be automatically be found when the first 
    | part of the namespace matches.
    | 
    | If there are multiple matches, only the first one will be loaded. If 
    | this becomes a problem, you should be more specific.
    | 
    | All items are as follows:
    | The (part of the) namespace => the matching directory
    | 
    */
    'namespaces' => [
        'models'        => 'app/models',
        'controllers'   => 'app/controllers',
        'Tres'          => 'vendor/Tres',
        'Trestle'       => 'vendor/Trestle',
        'Whoops'        => 'vendor/Whoops',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Class aliases
    |--------------------------------------------------------------------------
    | 
    | If there is a certain class which might be used very often, it might be 
    | useful to give it an alias, so it's easier and faster to call it.
    | 
    | All items are as follows:
    | The alias => the original class name
    | 
    */
    'aliases' => [
        'Config'            => 'Tres\config\Config',
        'Database'          => 'Trestle\Database',
        'Mail'              => 'Tres\mailer\Mail',
        'MailConnection'    => 'Tres\mailer\Connection',
        'Route'             => 'Tres\router\Route',
        'Redirect'          => 'Tres\router\Redirect',
        'URL'               => 'Tres\router\URL',
        'View'              => 'Tres\templating\View',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Files
    |--------------------------------------------------------------------------
    | 
    | If you need to load a specific file, you can do it here.
    | 
    */
    'files' => [
        'app/helpers/assets.php',
        'app/helpers/array.php',
        'app/helpers/debug.php',
        'app/helpers/security.php',
    ],
    
];
