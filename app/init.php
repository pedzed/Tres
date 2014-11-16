<?php

use packages\Tres\core\File;
use packages\Tres\database\Config as DBConfig;

// Paths for inclusion.
define('ROOT', dirname(__DIR__));
define('APP_DIR', ROOT.'/app');
define('PACKAGE_DIR', APP_DIR.'/packages');
define('CONFIG_DIR', APP_DIR.'/config');
define('CONTROLLER_DIR', APP_DIR.'/controllers');
define('MODEL_DIR', APP_DIR.'/models');
define('VIEW_DIR', APP_DIR.'/views');
define('PUBLIC_DIR', ROOT.'/public_html');

define('PUBLIC_URL', 
    ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://').
    $_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', PUBLIC_DIR)
    )
);
define('IMAGE_URL', PUBLIC_URL.'/images');
define('STYLE_URL', PUBLIC_URL.'/styles');
define('SCRIPT_URL', PUBLIC_URL.'/scripts');

spl_autoload_register(function($className){
    $class = str_replace('\\', '/', ROOT.'/app/'.$className.'.php');
    
    if(is_readable($class)){
        require_once($class);
    } else {
        die('Class <b>'.$className.'</b> is not readable. Does it exist?<br/>'.$class);
    }
});

// Class shortcuts
class_alias('packages\Tres\config\Config', 'Config');
class_alias('packages\Tres\router\Route', 'Route');
class_alias('packages\Tres\router\Redirect', 'Redirect');
class_alias('packages\Tres\router\URL', 'URL');
class_alias('packages\Tres\core\View', 'View');

// Config set-up
Config::add('app', CONFIG_DIR.'/app.php');
Config::add('db', CONFIG_DIR.'/db.php');
Config::add('router', CONFIG_DIR.'/router.php');

Route::setConfig(Config::get('router'));
DBConfig::set(Config::get('db'));

// Functions to load
File::inc(PACKAGE_DIR.'/Tres/functions/config.php');
File::inc(PACKAGE_DIR.'/Tres/functions/assets.php');
File::inc(PACKAGE_DIR.'/Tres/functions/quick-debug.php');

date_default_timezone_set(Config::get('app/timezone'));

// TODO: Move to new file.
// Debug check
switch(Config::get('app/debug')){
    default:
    case 0:
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
        break;
    case 1:
    case 2:
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        break;
}
