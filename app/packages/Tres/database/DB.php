<?php

namespace packages\Tres\database {
    
    use Exception;
    use ReflectionClass;
    
    use packages\Tres\database\Config;
    use packages\Tres\database\Connection;
    use packages\Tres\database\drivers;
    
    class DBException extends Exception {}
    
    class DB {
        
        /**
         * The database configuration.
         * 
         * @var array
         */
        protected $_config = [];
        
        /**
         * The database connection.
         * 
         * @var object
         */
        protected $_connection = null;
        
        /**
         * The name of the database driver.
         * 
         * @var string
         */
        protected $_driver = '';
        
        /**
         * Sets the connection to the database.
         * 
         * @param string $conn Connection name from the config.
         */
        public function __construct($conn = null){
            $this->_config = Config::get();
            
            if(empty($this->_config)){
                throw new DBException('Database configuration not set.');
            }
            
            $conn = isset($conn) ? $conn : $this->_config['default'];
            
            $this->_driver = $this->_config['connections'][$conn]['driver'];
            $this->_connection = (new Connection($conn))->getConnection();
            
            return $this->_connection;
        }
        
        /**
         * Allows the driver's class methods to be called like it originated
         * from this class.
         * 
         * @param  string $method The method name.
         * @param  string $args   The arguments.
         * @return object         ...
         */
        public function __call($method, $args){
            if(in_array($method, [
                'query',
                'create',
                'get',
                'update',
                'delete',
            ])){
                array_unshift($args, $this->_connection);
                
                // Instantiates the class like variadic.
                $class = ucfirst($method);
                $class = "packages\Tres\database\drivers\\{$this->_driver}\\{$class}";
                
                return (new ReflectionClass($class))->newInstanceArgs($args);
            } else {
                throw new DBException('Invalid database call.');
            }
        }
        
    }
    
}
