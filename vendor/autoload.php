<?php

use Tres\package_manager\Autoload;

require_once(VENDOR_DIR.'/Tres/package_manager/Autoload.php');

$autoload = new Autoload(ROOT);
$manifest = require_once('../app/manifest.php');

foreach($manifest['namespaces'] as $namespace => $dir){
    $autoload->addNamespace($namespace, $dir);
}

foreach($manifest['files'] as $file){
    $autoload->loadFile($file);
}
