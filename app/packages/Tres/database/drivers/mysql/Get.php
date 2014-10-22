<?php

namespace packages\Tres\database\drivers\mysql {
    
    use packages\Tres\database\drivers\AbstractDriver;
    use packages\Tres\database\drivers\GetInterface;
    
    class Get extends AbstractDriver implements GetInterface {
        
        /**
         * Construct.
         * 
         * @param object $conn   The database connection for the parent class.
         * @param string $table  The table to retrieve data from.
         * @param mixed  $fields (Optional) Specific fields to select.
         */
        public function __construct($conn, $table, $fields = array()){
            $this->_driver = 'mysql';
            $this->_connection = $conn;
            $this->_query = 'SELECT';
            
            if(!empty($fields)){
                if(is_array($fields)){
                    $this->_query .= ' `'.implode('`, `', $fields).'`';
                } else {
                    $this->_query .= " `{$fields}`";
                }
            } else {
                $this->_query .= ' *';
            }
            
            $this->_query .= " FROM `{$table}`";
        }
        
        public function where($field, $operator, $value){
            $this->_query .= " WHERE `{$field}` {$operator} ?";
            $this->_bindings[] = $value;
            return $this;
        }
        
        public function order($fields, $order){
            //
            
            return $this;
        }
        
        public function limit($limit){
            //
            
            return $this;
        }
        
        public function offset($offset){
            //
            
            return $this;
        }
        
    }
    
}

