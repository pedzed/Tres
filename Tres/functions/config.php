<?php

use Tres\core\Config;

/**
 * A shortcut to get the requested configuration by using the 
 * "root/branch/leaf" notation.
 */
function config($path){
    return Config::get($path);
}
