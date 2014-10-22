<?php

namespace packages\Tres\database\drivers\mysql {
    
    use packages\Tres\database\drivers\AbstractDriver;
    use packages\Tres\database\drivers\CreateInterface;
    
    class Create extends AbstractDriver implements CreateInterface {
        
        public function __construct($conn, $table, $fields = array()){
            $this->_driver = 'mysql';
            $this->_connection = $conn;
            $this->_query  = "INSERT INTO `{$table}`";
            $this->_query .= ' (`'.implode('`, `', array_keys($fields)).'`)';
            $this->_query .= ' VALUES';
            $this->_query .= " ('".implode("', '", array_values($fields))."')";
            
            foreach($fields as $field => $value){
                $this->_bindings[] = $value;
            }
        }
        
    }
    
}
