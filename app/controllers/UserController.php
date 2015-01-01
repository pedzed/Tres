<?php

namespace controllers {
    
    use Config;
    use View;
    use models\User;
    
    class UserController extends BaseController {
        
        /**
         * The user object.
         * 
         * @var object
         */
        protected $_user = null;
        
        /**
         * Instantiates the user.
         */
        protected function _getUser($username){
            $this->_user = new User($username);
            
            if(!$this->_user->exists()){
                echo 'This user does not exist.';
            }
        }
        
        public function getProfile($username){
            $this->_getUser($username);
            
            View::make('user-profile', [
                'appName' => Config::get('app/name'),
                'user' => $this->_user->getData(),
            ]);
        }
        
    }
    
}
