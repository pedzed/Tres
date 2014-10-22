<?php

namespace packages\Tres\core\app {
    
    use packages\Tres\core\Route;
    use packages\Tres\core\database\DBConnector;
    use packages\Tres\core\database\drivers;
    use packages\Tres\config\Config;
    
    /**
     * The framework application class.
     * 
     * This is the main entry point for all the code.
     */
    final class App {
        
        public static function init(){
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
                Route::setPath($path);
                require_once(APP_DIR.'/routes.php');
                Route::find();
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
