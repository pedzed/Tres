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
         * @param array $data
         */
        public function __construct(array $data){
            parent::__construct();
            
            $this->_user = new User($data['username']);
            
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
