<?php

use packages\Tres\core\File;
use packages\Tres\database\Config as DBConfig;
use packages\Tres\config\Config;

// Paths for inclusion.
define('ROOT', dirname(__DIR__));
define('APP_DIR', ROOT.'/app');
define('PACKAGE_DIR', APP_DIR.'/packages');
define('CONFIG_DIR', APP_DIR.'/config');
define('CONTROLLER_DIR', APP_DIR.'/controllers');
define('MODEL_DIR', APP_DIR.'/models');
define('VIEW_DIR', APP_DIR.'/views');
define('PUBLIC_DIR',
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://'.
    $_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', ROOT).'/public_html'
    )
);
define('IMAGE_DIR', PUBLIC_DIR.'/images');
define('STYLE_DIR', PUBLIC_DIR.'/styles');
define('SCRIPT_DIR', PUBLIC_DIR.'/scripts');

spl_autoload_register(function($className){
    $class = str_replace('\\', '/', ROOT.'/app/'.$className.'.php');
    
    if(is_readable($class)){
        require_once($class);
    } else {
        die('Class <b>'.$className.'</b> is not readable. Does it exist?');
    }
});

// Config set-up
Config::add('app', CONFIG_DIR.'/app.php');
Config::add('db', CONFIG_DIR.'/db.php');

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
