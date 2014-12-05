<?php

namespace models {
    
    use PDO;
    use Database;
    
    class User {
        
        /**
         * The database connection.
         * 
         * @var object
         */
        protected $_db = null;
        
        /**
         * The firstname of the user.
         * 
         * @var string
         */
        protected $_firstname = '';
        
        /**
         * The surname of the user.
         * 
         * @var string
         */
        protected $_surname = '';
        
        /**
         * The username of the user.
         * 
         * @var string
         */
        protected $_username = '';
        
        /**
         * The hashed password of the user.
         * 
         * @var string
         */
        protected $_password = '';
        
        /**
         * The email of the user.
         * 
         * @var string
         */
        protected $_email = '';
        
        /**
         * The last time the user data is modified.
         * 
         * @var string
         */
        protected $_lastModified = '';
        
        /**
         * Initializes the database connection and sets the username.
         * 
         * @param string $user
         */
        public function __construct($user){
            $this->_username = $user;
            $this->_db = new Database();
        }
        
        /**
         * Returns the presence of the user.
         * 
         * @return bool
         */
        public function exists(){
            //$user = $this->_db->query('SELECT `id` FROM `users` WHERE `username` = ?', $this->_username);
            $user = $this->_db->get('users', 'id')
                              ->where('username', '=', $this->_username)
                              ->exec();
            return ($user) ? true : false;
        }
        
        /**
         * Gets the user data.
         * 
         * @param  string $user The username of the user.
         * @return array        The user data.
         */
        public function getData(){
            $user = $this->_db->get('users')
                              ->where('username', '=', $this->_username)
                              ->exec();
            $user = $user->fetch(PDO::FETCH_OBJ);
            
            if($user){
                $this->_firstname = $user->firstname;
                $this->_surname = $user->surname;
                $this->_password = $user->password;
                $this->_email = $user->email;
                $this->_modificationDate = $user->modification_date;
                
                return [
                    'id' => $user->id,
                    'firstname' => $this->_firstname,
                    'surname' => $this->_surname,
                    'username' => $this->_username,
                    'password' => $this->_password,
                    'email' => $this->_email,
                    'registration_date' => $user->registration_date,
                    'modification_date' => $this->_modificationDate
                ];
            }
        }
        
    }
    
}
