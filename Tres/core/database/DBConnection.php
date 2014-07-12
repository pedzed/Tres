<?php

namespace Tres\core\database {
    
    use PDO;
    use PDOException;
    use Tres\core\Config;
    
    class DBConnection {
        
        /**
         * The database connection.
         * 
         * @var object
         */
        protected $_connection = null;
        
        /**
         * Construct.
         * 
         * @param string $conn Connection name from the config.
         */
        public function __construct($conn){
            try {
                $this->_connection = $this->_connect($conn);
            } catch(PDOException $e){
                // TODO: Log error to file.
                // TODO: Move to separate file
                if(Config::get('app/debug') == 1){
                    echo $e->getMessage();
                } else if(Config::get('app/debug') == 2){
                    echo $e;
                }
            }
        }
        
        /**
         * Sets the database connection.
         * 
         * @param  string $conn Connection name from the config.
         * @return object
         */
        protected function _connect($conn){
            $dbInfo = Config::get('db/connections/'.$conn);
            
            return new PDO(
                $dbInfo['driver'].':'.
                'dbname='.$dbInfo['database'].';'.
                'host='.$dbInfo['host'].';'.
                'port='.$dbInfo['port'].';'.
                'charset='.$dbInfo['charset'],
                $dbInfo['username'],
                $dbInfo['password']
            );
        }
        
        public function getConnection(){
            return $this->_connection;
        }
        
    }
    
}
