<?php

use Tres\package_manager\Autoload;

require_once(VENDOR_DIR.'/Tres/package_manager/Autoload.php');

$autoload = new Autoload(ROOT_DIR, require_once(AUTOLOAD_MANIFEST));
