<?php

namespace app\controllers {
    
    use Tres\core\app\Version;
    use Tres\core\Config;
    use Tres\core\View;
    
    class HomeController extends BaseController {
        
        public function renderPage(){
            View::make('home', array(
                'appName' => Config::get('app/name'),
                'tresVersion' => (new Version())->get()
            ));
        }
        
    }
    
}
