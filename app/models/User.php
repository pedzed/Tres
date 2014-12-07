<?php

namespace models {
    
    use Database;
    
    class User {
        
        /**
         * The database connection.
         * 
         * @var object
         */
        protected $_db = null;
        
        /**
         * The user data.
         * 
         * @var array
         */
        protected $_data = [];
        
        /**
         * Initializes the database connection and sets the username.
         * 
         * @param string $user
         */
        public function __construct($username = null){
            $this->_db = new Database();
            
            if(empty($username)){
                // Check if a user session is set
            } else {
                $this->_data['username'] = $username;
            }
        }
        
        /**
         * Returns the presence of the user.
         * 
         * @return bool
         */
        public function exists($username = null){
            if(empty($username)){
                $username = $this->_data['username'];
            }
            
            $user = $this->_db->get('users', 'id')
                              ->where('username', '=', $username)
                              ->exec();
            
            return ($user) ? true : false;
        }
        
        /**
         * Gets the user data.
         * 
         * @param  string $user The username of the user.
         * @return array        The user data.
         */
        public function getData($username = null){
            if(empty($username)){
                $username = $this->_data['username'];
            }
            
            $user = $this->_db->get('users')
                              ->where('username', '=', $username)
                              ->exec();
            
            return $this->_data = $user->first();
        }
        
    }
    
}
