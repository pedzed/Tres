<?php

use Tres\core\File;
//use Tres\database\Config as DBConfig;
use Tres\mailer\Config as MailConfig;

// Paths for inclusion.
define('ROOT', dirname(__DIR__));
define('APP_DIR', ROOT.'/app');
define('VENDOR_DIR', ROOT.'/vendor');
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

require_once(VENDOR_DIR.'/autoload.php');

// Class shortcuts
class_alias('Tres\config\Config', 'Config');
class_alias('Tres\core\Asset', 'Asset');
class_alias('Tres\core\View', 'View');
class_alias('Tres\mailer\Mail', 'Mail');
class_alias('Tres\mailer\Connection', 'MailConnection');
class_alias('Tres\router\Route', 'Route');
class_alias('Tres\router\Redirect', 'Redirect');
class_alias('Tres\router\URL', 'URL');

// Config set-up
Config::add('app', CONFIG_DIR.'/app.php');
Config::add('db', CONFIG_DIR.'/db.php');
Config::add('router', CONFIG_DIR.'/router.php');
Config::add('mailer', CONFIG_DIR.'/mailer.php');

//DBConfig::set(Config::get('db'));
Route::setConfig(Config::get('router'));
MailConfig::set(Config::get('mailer'));

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
