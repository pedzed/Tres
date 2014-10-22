<?php

/**
 * Dump and die
 * 
 * Dumps a variable in pre-formatted text and kills the page afterwards.
 * 
 * @param mixed $var The variable to dump.
 */
function dd($var, $die = true){
    echo '<pre>', var_dump($var), '</pre>';
    
    if($die) die();
}

/**
 * Print and die
 * 
 * Prints an array in pre-formatted text and kills the page afterwards.
 * 
 * @param array $var The variable to dump.
 */
function pd($var, $die = true){
    echo '<pre>', print_r($var), '</pre>';
    
    if($die) die();
}
