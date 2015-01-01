<?php

use Tres\security\XSS\HTML as XSSHTML;

/**
 * A shortcut to add a style resource to the application.
 * 
 * @param  string $file     The file.
 * @param  bool   $relative Whether it is a relative URI or not.
 * 
 * @return string The generated HTML tag.
 */
function style($file, $relative = true){
    $file = ($relative) ? PUBLIC_URL.'/'.$file : $file;
    
    return '<link rel="stylesheet" href="'.XSSHTML::escape($file).'" />';
}

/**
 * A shortcut to add a JavaScript resource to the application.
 * 
 * @param  string $file     The file.
 * @param  bool   $relative Whether it is a relative URI or not.
 * 
 * @return string The generated HTML tags.
 */
function script($file, $relative = true){
    $file = ($relative) ? PUBLIC_URL.'/'.$file : $file;
    
    return '<script type="text/javascript" src="'.XSSHTML::escape($file).'"></script>';
}

/**
 * A shortcut to add a favicon to the application.
 * 
 * @param  string $file     The file.
 * @param  bool   $relative Whether it is a relative URI or not.
 * 
 * @return string The generated HTML tag.
 */
function favicon($file = 'favicon.ico', $relative = true){
    $file = ($relative) ? PUBLIC_URL.'/'.$file : $file;
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    
    switch($ext){
        case 'png':
            $type = 'image/png';
        break;
        
        case 'gif':
            $type = 'image/gif';
        break;
        
        default:
            $type = 'image/x-icon';
        break;
    }
    
    return '<link rel="icon" type="'.$type.'" href="'. XSSHTML::escape($file).'" />';
}
