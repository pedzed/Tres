<?php

namespace controllers {
    
    use packages\Tres\core\app\Version;
    use packages\Tres\core\View;
    use packages\Tres\config\Config;
    
    class HomeController extends BaseController {
        
        public function renderPage(){
            View::make('home', [
                'appName' => Config::get('app/name'),
                'tresVersion' => (new Version())->get()
            ]);
        }
        
    }
    
}
