<?php

namespace packages\Tres\database\drivers {
    
    abstract class AbstractDriver {
        
        /**
         * The database connection.
         * 
         * @var object
         */
        protected $_connection = null;
        
        /**
         * The database driver being used.
         * 
         * @var string
         */
        protected $_driver = '';
        
        /**
         * The query to build.
         * 
         * @var string
         */
        protected $_query = '';
        
        /**
         * The placeholders to bind later on.
         * 
         * @var array
         */
        protected $_bindings = [];
        
        /**
         * Executes the method chain.
         * 
         * @return object
         */
        public function exec(){
            $class = "packages\Tres\database\drivers\\{$this->_driver}\Query";
            return new $class($this->_connection, $this->_query, $this->_bindings);
        }
        
        /**
         * Returns the built SQL.
         * 
         * @return string
         */
        public function getSQL(){
            return $this->_query;
        }
        
        /**
         * Returns the placeholders with its values.
         * 
         * @return string
         */
        public function getBindings(){
            return $this->_bindings;
        }
        
        /**
         * Returns some info about the query.
         * 
         * @return string
         */
        public function debug(){
            return [
                $this->getSQL(),
                $this->getBindings()
            ];
        }
        
    }
    
}
