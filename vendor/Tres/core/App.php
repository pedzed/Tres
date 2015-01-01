<?php

namespace Tres\core {
    
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
            header('X-Powered-By: Tres Framework/'.Version::get());
            
            // Check if the app is compatible with the server environment.
            $compatChecker = new CompatibilityChecker();
            $compatChecker->checkPHPVersion();
            $compatChecker->checkModRewrite();
            
            require_once(APP_DIR.'/routes.php');
            
            Route::dispatch();
        }
        
    }
    
}
