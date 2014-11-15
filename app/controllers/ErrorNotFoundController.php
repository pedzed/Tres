<?php

namespace controllers {
    
    use Config;
    use View;
    
    /**
     * The "Not Found (404)" error controller.
     */
    class ErrorNotFoundController extends BaseController {
        
        /**
         * Renders the page.
         */
        public function renderPage(){
            header('HTTP/1.0 404 Not Found');
            
            View::make('errors/error-404', [
                'appName' => Config::get('app/name'),
            ]);
        }
        
    }
    
}
