<?php

namespace Tres\core\app {
    
    use Config;
    use Route;
    
    /*
    |--------------------------------------------------------------------------
    | App - The framework application class
    |--------------------------------------------------------------------------
    | 
    | This is the main entry point for the framework.
    | 
    */
    final class App {
        
        /**
         * Initializes the application.
         */
        public static function init(){
            header('X-Powered-By: Tres Framework/'.Version::get(true, true, true));
            
            // Check if the app is compatible with the server environment.
            $compatChecker = new CompatibilityChecker();
            $compatChecker->checkPHPVersion();
            $compatChecker->checkModRewrite();
            
            // Interaction with the Route class.
            $path = (isset($_GET['path'])) ? rtrim($_GET['path'], '/') : '/';
            
            require_once(APP_DIR.'/routes.php');
            
            Route::dispatch();
        }
        
    }
    
}
