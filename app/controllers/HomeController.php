<?php

namespace controllers {
    
    use Config;
    use View;
    use packages\Tres\core\app\Version as TresVersion;
    
    class HomeController extends BaseController {
        
        public function renderPage(){
            View::make('home', [
                'appName' => Config::get('app/name'),
                'tresVersion' => TresVersion::get()
            ]);
        }
        
    }
    
}
