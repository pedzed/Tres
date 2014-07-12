<?php

namespace Tres\core\database {
    
    use PDO;
    
    class DB {
        
        /**
         * The database connection.
         * 
         * @var object
         */
        protected $_connection = null;
        
        /**
         * The query string which gets created.
         * 
         * @var string
         */
        protected $_query = "";
        
        /**
         * Values to bind before query execution.
         * 
         * @var array
         */
        protected $_bindings = array();
        
        public function __construct(PDO $conn){
            $this->_connection = $conn;
        }
        
        public function query($query, $bindings){
            $this->_query = $query;
            $this->_bindings = $bindings;
            return $this;
        }
        
        /**
         * Gets the query. Might be useful for debugging.
         * 
         * @return string
         */
        public function getQuery(){
            return $this->_query;
        }
        
        /**
         * Gets the bindings. Might be useful for debugging.
         * 
         * @return string
         */
        public function getBindings(){
            return $this->_bindings;
        }
        
        public function fetch(){
            $stmt = $this->_connection->prepare($this->_query);
            
            foreach($this->_bindings as $field => $value){
                $stmt->bindValue(':'.$field, $value);
            }
            
            $stmt->execute();
            return $stmt->fetchObject();
        }
        
    }
    
}
