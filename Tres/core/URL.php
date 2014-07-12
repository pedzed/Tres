<?php

namespace Tres\core {
    
    use Tres\core\Route;
    
    class URL {
        
        /**
         * Returns the absolute path of the given route.
         * 
         * @param  string $alias The route's alias.
         * @return string
         */
        public static function route($alias){
            foreach(Route::getRoutes() as $route => $options){
                if(isset($options['alias']) && $alias === $options['alias']){
                    return PUBLIC_DIR.'/'.ltrim($route, '/');
                }
            }
        }
        
    }
    
}
