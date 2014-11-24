<?php

/**
 * A shortcut to add a style resource to the application.
 */
function style($file, $relative = true){
    return (new Asset())->getStyle($file, $relative);
}

/**
 * A shortcut to add a JavaScript resource to the application.
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
