<?php

namespace packages\Tres\core {
    
    use Exception;
    
    use packages\Tres\core\URL;
    use packages\Tres\config\Config;
    
    class RedirectException extends Exception {}
    
    class Redirect {
        
        // Prevents instantiation.
        private function __construct(){}
        private function __clone(){}
        
        /**
         * Redirects and kills the page.
         * 
         * @param string $url The path to redirect.
         */
        public static function to($url){
            header('Location: '.$url);
            die();
        }
        
        /**
         * Redirects to the specified route.
         * 
         * @param string $alias The route's alias.
         */
        public static function route($alias){
            Redirect::to(URL::route($alias));
        }
        
    }
    
}
