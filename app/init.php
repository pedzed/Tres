<?php

use Tres\package_manager\Autoloader;

/*
|------------------------------------------------------------------------------
| URI registration
|------------------------------------------------------------------------------
| 
| To prevent hardcoding the most important URI's, there are constants available 
| to determine where to access a certain file or path. 
| 
*/
define('ROOT_DIR', str_replace('\\', '/', dirname(__DIR__)));
define('APP_DIR', ROOT_DIR.'/app');
define('VENDOR_DIR', ROOT_DIR.'/vendor');
define('CONFIG_DIR', APP_DIR.'/config');
define('CONTROLLER_DIR', APP_DIR.'/controllers');
define('MODEL_DIR', APP_DIR.'/models');
define('VIEW_DIR', APP_DIR.'/views');
define('STORAGE_DIR', APP_DIR.'/storage');
define('LOG_DIR', STORAGE_DIR.'/logs');
define('PUBLIC_DIR', ROOT_DIR.'/public_html');

define('PUBLIC_URL', 
    ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://').
    $_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        rtrim(PUBLIC_DIR, '/')
    )
);

/*
|------------------------------------------------------------------------------
| Autoloading
|------------------------------------------------------------------------------
| 
| The autoloader handles everything to be able to make use of dependencies. 
| However, it relies on the dependency manifest.
| 
*/
require_once(VENDOR_DIR.'/Tres/package_manager/Autoloader.php');
$autoloader = new Autoloader(ROOT_DIR, require_once(APP_DIR.'/dependencies.php'));

/*
|------------------------------------------------------------------------------
| Configuration set-up
|------------------------------------------------------------------------------
| 
| Every configuration needs to be manually assigned with an alias/path 
| combination so it can be nicely accessed.
| 
*/
Config::add('app', CONFIG_DIR.'/app.php');
Config::add('db', CONFIG_DIR.'/database.php');
Config::add('mailer', CONFIG_DIR.'/mailer.php');

Route::$config = [
    'root' => PUBLIC_DIR,
    'default_controller_namespace' => 'controllers'
];

View::$rootURI = VIEW_DIR;
View::$storageDir = STORAGE_DIR.'/views/';

Tres\mailer\Config::set(Config::get('mailer'));

Trestle\Config::set(Config::get('db'));

/*
|------------------------------------------------------------------------------
| Server settings
|------------------------------------------------------------------------------
| 
| Every server may have a different configuration. Any supported configuration 
| can be added here, so they get overwritten.
| 
*/
date_default_timezone_set(Config::get('app/timezone'));

/*
|------------------------------------------------------------------------------
| Debug management
|------------------------------------------------------------------------------
| 
| Here you can tell the application what to do if the debug configuration is 
| set to a certain mode.
| 
*/
switch(Config::get('app/debug')){
    default:
    case 0:
        ini_set('display_errors', 0);
        error_reporting(0);
        
        set_exception_handler(function($e){
            // TODO: Log $e.
        });
    break;
    
    case 1:
        ini_set('display_errors', 1);
        error_reporting(-1);
        
        set_exception_handler(function($e){
            echo $e->getMessage();
        });
    break;
    
    case 2:
        ini_set('display_errors', 1);
        error_reporting(-1);
        
        $whoops = new Whoops\Run;
        $whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    break;
}

