<?php

namespace packages\Tres\database\drivers {
    
    interface UpdateInterface {
        
        public function __construct($conn, $table, $fields);
        public function where();
        
    }
    
}
