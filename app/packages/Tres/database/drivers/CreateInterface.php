<?php

namespace packages\Tres\database\drivers {
    
    interface CreateInterface {
        
        public function __construct($conn, $table, $fields = array());
        
    }
    
}
