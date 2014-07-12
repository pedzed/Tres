<?php

namespace app\controllers {
    
    use Tres\core\Config;
    use Tres\core\View;
    
    class ErrorNotFoundController extends BaseController {
        
        /**
         * This is the default controller method.
         */
        public function renderPage(){
            header('HTTP/1.0 404 Not Found');
            
            View::make('errors/error-404', array(
                'app_name' => Config::get('app/name'),
            ));
        }
        
    }
    
}
