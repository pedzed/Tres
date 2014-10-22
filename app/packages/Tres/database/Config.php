<?php

namespace packages\Tres\database {
    
    final class Config {
        
        /**
         * The database configuration.
         * 
         * @var array
         */
        protected static $_config = [];
        
        // Prevent instantiation
        private function __construct(){}
        private function __clone(){}
        
        /**
         * Sets the config.
         * 
         * @param array $config
         */
        public static function set(array $config){
            self::$_config = $config;
        }
        
        public static function get(){
            return self::$_config;
        }
        
    }
    
}
