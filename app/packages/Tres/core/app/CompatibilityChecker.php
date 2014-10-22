<?php

namespace packages\Tres\core\app {
    
    use Exception;
    
    class CompatibilityCheckerException extends Exception {}
    
    /**
     * Compatibility checker
     * 
     * Tells whether the application is compatible with the server environment 
     * or not.
     */
    class CompatibilityChecker {
        
        /**
         * Tells whether the PHP version is supported or not.
         * 
         * @return bool
         */
        public function hasSupportedPHPVersion(){
            return version_compare(PHP_VERSION, '5.4', '>=');
        }
        
        /**
         * Tells whether mod_rewrite is enabled or not.
         * 
         * @return bool
         */
        public function hasModRewrite(){
            // Only checked if the server software is Apache
            if(apache_get_version()){
                return in_array('mod_rewrite', apache_get_modules());
            }
        }
        
        /**
         * Checks the PHP version.
         */
        public function checkPHPVersion(){
            if(!$this->hasSupportedPHPVersion()){
                throw new CompatibilityCheckerException(
                    'Tres is not compatible with PHP versions below 5.4.
                     Please, consider upgrading to the latest PHP version.'
                );
            }
        }
        
        /**
         * Check if mod_rewrite is enabled.
         */
        public function checkModRewrite(){
            if(!$this->hasModRewrite()){
                throw new CompatibilityCheckerException(
                    'The mod_rewrite module must be enabled in order to be 
                     able to make use of the routing system.'
                );
            }
        }
        
    }
    
}
