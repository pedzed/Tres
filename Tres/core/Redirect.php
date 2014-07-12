<?php

namespace Tres\core {
    
    use Exception;
    use Tres\core\Config;
    use Tres\core\URL;
    
    class RedirectException extends Exception {}
    
    class Redirect {
        
        // Prevents instantiation
        private function __construct(){}
        private function __destruct(){}
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
