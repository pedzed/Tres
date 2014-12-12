<?php

namespace controllers {
    
    use Config;
    use View;
    
    class HomeController extends BaseController {
        
        public function renderPage(){
            View::make('home', [
                'appName' => Config::get('app/name'),
                'tresVersion' => \Tres\core\Version::get()
            ]);
        }
        
    }
    
}
