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
        public function __construct($username){
            parent::__construct();
            
            $this->_user = new User($username['username']); // TODO: Fix router bug.
            
            if(!$this->_user->exists()){
                echo 'This user does not exist.';
            }
        }
        
        public function getProfile(){
            View::make('user-profile', [
                'appName' => Config::get('app/name'),
                'user' => $this->_user->getData(),
            ]);
        }
        
    }
    
}
