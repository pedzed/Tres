<?php

namespace packages\Tres\database {
    
    use PDO;
    use PDOException;
    
    use packages\Tres\database\Config;
    
    class Connection {
        
        /**
         * The database connection.
         * 
         * @var object
         */
        protected $_connection = null;
        
        /**
         * Sets the database connection.
         * 
         * @param string $conn Connection name from the config.
         */
        public function __construct($conn){
            $dbInfo = Config::get()['connections'][$conn];
            
            try {
                $this->_connection = new PDO(
                    $dbInfo['driver'].':'.
                    'dbname='.$dbInfo['database'].';'.
                    'host='.$dbInfo['host'].';'.
                    'port='.$dbInfo['port'].';'.
                    'charset='.$dbInfo['charset'],
                    $dbInfo['username'],
                    $dbInfo['password']
                );
                
                if(Config::get()['display_errors']){
                    $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            } catch(PDOException $e){
                // TODO: Log error to file.
                // TODO: Move to separate file
                //if(Config::get('app/debug') == 1){
                    echo $e->getMessage();
                //} else if(Config::get('app/debug') == 2){
                //    echo $e;
                //}
            }
        }
        
        public function getConnection(){
            return $this->_connection;
        }
        
    }
    
}
