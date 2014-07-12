<?php

use Tres\core\SplClassLoader;
use Tres\core\Config;
use Tres\core\File;

// Root paths for inclusion.
define('ROOT', dirname(__DIR__));
define('TRES_DIR', ROOT.'/Tres');

define('APP_DIR', ROOT.'/app');
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

// Autoload classes
require_once(TRES_DIR.'/core/SplClassLoader.php');

$splClassLoader = new SplClassLoader();
$splClassLoader->setIncludePath(ROOT);
$splClassLoader->register();

// Functions to load
File::inc(TRES_DIR.'/functions/config.php');
File::inc(TRES_DIR.'/functions/assets.php');
File::inc(TRES_DIR.'/functions/quick-debug.php');

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
