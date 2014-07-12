<?php

use Tres\core\Asset;

/**
 * A shortcut to include CSS stylesheets to the application.
 */
function style($file, $relative = true){
    return (new Asset())->getStyle($file, $relative);
}

/**
 * A shortcut to include JavaScript scripts to the application.
 */
function script($file, $relative = true){
    return (new Asset())->getScript($file, $relative);
}

/**
 * A shortcut to add a favicon to the application.
 */
function favicon($file = 'favicon.ico', $relative = true){
    return (new Asset())->getFavicon($file, $relative);
}
