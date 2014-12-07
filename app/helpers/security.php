<?php

/**
 * Escapes HTML to prevent XSS attacks.
 * 
 * @param  string $str      The string being converted.
 * @param  int    $flags    (Optional) Specifies how to handle quotes.
 * @param  string $encoding (Optional) Defines encoding used in conversion.
 * 
 * @return string           The converted string.
 */
function e($str, $flags = ENT_QUOTES, $encoding = 'UTF-8'){
    if(class_exists('\Tres\security\XSS\HTML')){
        return Tres\security\XSS\HTML::escape($str, $flags, $encoding);
    }
    
    return htmlspecialchars($str, $flags, $encoding);
}
