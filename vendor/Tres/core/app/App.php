<?php

namespace Tres\core\app {
    
    use Config;
    use Route;
    
    /**
     * The framework application class.
     * 
     * This is the main entry point for all the code.
     */
    final class App {
        
        /**
         * Initializes the application.
         */
        public static function init(){
            header('X-Framework: Tres Framework/'.Version::get(true, true, true));
            
            // Check if the app is compatible with the server environment.
            try {
                $compatChecker = new CompatibilityChecker();
                $compatChecker->checkPHPVersion();
                $compatChecker->checkModRewrite();
            } catch(CompatibilityCheckerException $e){
                // TODO: Log error to file.
                // TODO: Move to separate file
                if(Config::get('app/debug') == 1){
                    echo $e->getMessage();
                } else if(Config::get('app/debug') == 2){
                    echo $e;
                }
            }
            
            // Interaction with the Route class.
            try {
                $path = (isset($_GET['path'])) ? rtrim($_GET['path'], '/') : '/';
                
                require_once(APP_DIR.'/routes.php');
                
                Route::dispatch();
            } catch(RouteException $e){
                // TODO: Log error to file.
                // TODO: Move to separate file
                if(Config::get('app/debug') == 1){
                    echo $e->getMessage();
                } else if(Config::get('app/debug') == 2){
                    echo $e;
                }
            }
            
        }
        
    }
    
}
