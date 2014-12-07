<?php

/**
 * Retrieves a given value from a nested array using "dot" notation.
 * 
 * @param  array  $array   The array to search from.
 * @param  string $key     The key to search.
 * @param  mixed  $default The default value.
 * 
 * @return mixed
 */
function array_get($array, $key, $default = null){
    if(is_null($key)){
        return $array;
    }
    
    if(isset($array[$key])){
        return $array[$key];
    }
    
    foreach(explode('.', $key) as $segment){
        if(!is_array($array) || ! array_key_exists($segment, $array)){
            return $default;
        }
        
        $array = $array[$segment];
    }
    
    return $array;
}
