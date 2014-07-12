<?php

namespace Tres\core\app {
    
    use Tres\core\Config;
    use Tres\core\Route;
    use Tres\core\database\DBConnector;
    use Tres\core\database\drivers;
    
    /**
     * The framework application class.
     * 
     * This is the main entry point for all the code.
     */
    final class App {
        
        public function __construct(){
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
