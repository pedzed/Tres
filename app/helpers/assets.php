<?php

/**
 * A shortcut to add a style resource to the application.
 * 
 * @param  string $file     The file.
 * @param  bool   $relative Whether it is a relative URI or not.
 * 
 * @return string
 */
function style($file, $relative = true){
    return (new Asset())->getStyle($file, $relative);
}

/**
 * A shortcut to add a JavaScript resource to the application.
 * 
 * @param  string $file     The file.
 * @param  bool   $relative Whether it is a relative URI or not.
 * 
 * @return string
 */
function script($file, $relative = true){
    return (new Asset())->getScript($file, $relative);
}

/**
 * A shortcut to add a favicon to the application.
 * 
 * @param  string $file     The file.
 * @param  bool   $relative Whether it is a relative URI or not.
 * 
 * @return string
 */
function favicon($file = 'favicon.ico', $relative = true){
    return (new Asset())->getFavicon($file, $relative);
}
