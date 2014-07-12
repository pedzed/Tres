<?php

namespace Tres\core {
    
    class ArrayObjectExt extends \ArrayObject {
        
        /**
         * Delimiter used to split the path.
         * 
         * @var string
         */
        protected $_pathDelimiter = '/';
        
        /**
         * Gets a value from an array by using the "root/branch/leaf" notation.
         * 
         * @param  string $path    Path to a specific option to extract.
         * @param  mixed  $default Value to use if the path was not found.
         * @return mixed           Returns either an array or a string.
         */
        public function getPathValue($path, $default = null){
            if(empty($path)){
                throw new \Exception('Path cannot be empty.');
            }
            
            $path = trim($path, $this->_pathDelimiter);
            $value = $this;
            $parts = explode($this->_pathDelimiter, $path);
            
            foreach($parts as $part){
                if(isset($value[$part])){
                    $value = $value[$part];
                }
            }
            
            return $value;
        }
        
        /**
         * Sets the path delimiter.
         * 
         * @param string $delimiter
         */
        public function setPathDelimiter($delimiter){
            $this->_pathDelimiter = (string) $delimiter;
        }
        
    }
    
}
