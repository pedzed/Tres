<?php

namespace Tres\core\database {
    
    interface DBInterface {
        
        public function create();
        public function get($fields);
        public function update();
        public function delete();
        
        public function into($table);
        public function from($table);
        
        public function where($field, $operator, $value);
        public function limit($limit);
        
    }
    
}
