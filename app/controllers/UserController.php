<?php

namespace app\controllers {
    
    use Tres\core\Config;
    use Tres\core\Redirect;
    use Tres\core\View;
    use app\models\User;
    
    class UserController extends BaseController {
        
        /**
         * The user object.
         * 
         * @var object
         */
        protected $_user = null;
        
        /**
         * Instantiates the user.
         * 
         * @param array $data
         */
        public function __construct(array $data){
            $this->_user = new User($data['username']);
            
            if(!$this->_user->exists()){
                Redirect::route('error-404');
            }
        }
        
        public function getProfile($user){
            View::make('user-profile', array(
                'app_name' => Config::get('app/name'),
                'user_data' => $this->_user->getData(),
            ));
        }
        
    }
    
}
