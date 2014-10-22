<?php

namespace packages\Tres\database\drivers {
    
    interface DeleteInterface {
        
        public function __construct($conn, $table);
        public function where();
        
    }
    
}
