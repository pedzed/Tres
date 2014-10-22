<?php

namespace packages\Tres\database\drivers {
    
    interface QueryInterface {
        
        public function __construct($conn, $sql, $bindings = array());
        
    }
    
}
