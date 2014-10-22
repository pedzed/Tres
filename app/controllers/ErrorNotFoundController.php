<?php

namespace controllers {
    
    use packages\Tres\core\View;
    use packages\Tres\config\Config;
    
    class ErrorNotFoundController extends BaseController {
        
        /**
         * This is the default controller method.
         */
        public function renderPage(){
            header('HTTP/1.0 404 Not Found');
            
            View::make('errors/error-404', [
                'appName' => Config::get('app/name'),
            ]);
        }
        
    }
    
}
