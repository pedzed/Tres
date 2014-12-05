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
         * 
         * @param string $username
         */
        public function __construct($username){ // TODO: Fix router bug.
            parent::__construct();
            
            $this->_user = new User($username);
            
            if(!$this->_user->exists()){
                // 
            }
        }
        
        public function getProfile($user){
            View::make('user-profile', [
                'appName' => Config::get('app/name'),
                'userData' => $this->_user->getData(),
            ]);
        }
        
    }
    
}
