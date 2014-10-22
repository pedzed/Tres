<?php

namespace packages\Tres\database\drivers {
    
    interface GetInterface {
        
        public function __construct($conn, $table, $fields);
        public function where($field, $operator, $value);
        public function order($fields, $order);
        public function limit($limit);
        public function offset($offset);
        
    }
    
}
