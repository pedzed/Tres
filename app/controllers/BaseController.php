<?php

namespace controllers {
    
    use Exception;
    
    use packages\Tres\core\View;
    use packages\Tres\config\Config;
    
    class ControllerException extends Exception {}
    
    /**
     * The BaseController class.
     * 
     * This is the base for all other controllers. Extend this for each
     * created controller and get access to its functionalities.
     */
    abstract class BaseController {
        
        public function __construct(){
            if(Config::get('app/offline')){
                View::make('offline', [
                    'appName' => Config::get('app/name')
                ]);
                die();
            }
        }
        
    }
    
}
