<?php

namespace Tres\core\database\drivers {
    
    use Tres\core\database\DB;
    use Tres\core\database\DBException;
    use Tres\core\database\DBInterface;
    
    class MySQL extends DB implements DBInterface {
        
        public function create(){
            $this->_query = 'INSERT ';
            $this->_bindings = [];
            return $this;
        }
        
        /**
         * Get (query start)
         * 
         * @param  string $fields One table field.
         * @param  array  $fields One or multiple table fields.
         * @return object         Returns current object for method chain.
         */
        public function get($fields){
            if(isset($fields[0]) && $fields[0] !== '*'){
                $fields = '`'.implode('`, `', $fields).'`';
            } else {
                $fields = '*';
            }
            
            $this->_query = "SELECT {$fields}";
            $this->_bindings = [];
            return $this;
        }
        
        public function update(){
            $this->_query = "UPDATE";
            $this->_bindings = [];
            return $this;
        }
        
        public function delete(){
            $this->_query = "DELETE";
            $this->_bindings = [];
            return $this;
        }
        
        public function into($table){
            return $this;
        }
        
        public function from($table){
            $this->_query .= " FROM `{$table}`";
            return $this;
        }
        
        public function where($field, $operator, $value){
            $this->_query .= " WHERE `{$field}` {$operator} :{$field}";
            $this->_bindings = array($field => $value);
            return $this;
        }
        
        public function limit($limit){
            return $this;
        }
        
    }
    
}
