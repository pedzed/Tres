<?php

namespace Tres\core\database {
    
    use PDO;
    use PDOException;
    use Tres\core\Config;
    use Tres\core\database\drivers\MySQL;
    
    class DBObject {
        
        /**
         * The database connection.
         * 
         * @var object
         */
        protected $_connection = null;
        
        /**
         * The database driver object.
         * 
         * @var object
         */
        protected $_driver = null;
        
        /**
         * Sets the connection to the database.
         * 
         * @param string $conn Connection name from the config.
         */
        public function __construct($conn = null){
            $conn = isset($conn) ? $conn : Config::get('db/default');
            $dbInfo = Config::get('db/connections/'.$conn);
            
            $this->_connection = (new DBConnection($conn))->getConnection();
            
            switch($dbInfo['driver']){
                case 'mysql':
                    $this->_driver = new MySQL($this->_connection);
                    break;
            }
            
            return $this->_connection;
        }
        
        /**
         * Allows the driver's class methods to be called like it originated
         * from this class.
         * 
         * @param  string $method The method name.
         * @param  string $args   The arguments.
         * @return object         Driver instance for method chaining.
         */
        public function __call($method, $args){
            switch($method){
                case 'query':
                    return $this->_driver->query($args[0], $args[1]);
                case 'create':
                    return $this->_driver->create();
                case 'get':
                    return $this->_driver->get($args);
                case 'update':
                    return $this->_driver->update();
                case 'delete':
                    return $this->_driver->delete();
            }
        }
        
    }
    
}
