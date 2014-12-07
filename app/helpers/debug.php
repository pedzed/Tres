<?php

/**
 * Dumps a variable in pre-formatted text and kills the page.
 * 
 * @param mixed $var The variable to dump.
 */
function dd($var, $die = true){
    echo '<pre>', var_dump($var), '</pre>';
    
    if($die){
        die();
    }
}

/**
 * Prints an array recursivly in pre-formatted text and kills the page.
 * 
 * @param array $var The variable to print.
 */
function pd($var, $die = true){
    echo '<pre>', print_r($var), '</pre>';
    
    if($die){
        die();
    }
}
