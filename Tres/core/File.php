<?php

namespace Tres\core {
    
    class FileException extends \Exception {}
    
    class File {
        
        /**
         * Include a file.
         * 
         * @param  string   $file     Path to the file.
         * @param  bool     $required (Optional) Whether to require or include.
         * @return resource
         */
        public static function inc($file, $required = true){
            if(self::_checkReadable($file)){
                return ($required) ? require $file : include $file;
            }
        }
        
        /**
         * Check whether a file is readable.
         * 
         * @param  string $file Path to the file.
         * @return bool
         */
        protected static function _checkReadable($file){
            if(file_exists($file)){
                if(is_readable($file)){
                    return true;
                }
                
                return false;
            }
            
            throw new FileException('File "'.$file.'" does not exist.');
        }
        
    }
    
}
