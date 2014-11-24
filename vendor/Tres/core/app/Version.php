<?php

namespace Tres\core\app {
    
    /**
     * The framework version.
     */
    final class Version {
        
        /**
         * Major version.
         * 
         * Changed when many new features are going to be introduced.
         */
        const MAJOR_VERSION = 0;
        
        /**
         * Minor version.
         * 
         * Typically introcudes new functionality, makes code better, or contains
         * general updates and improvements. This SHOULD be backwards compatible.
         */
        const MINOR_VERSION = 5;
        
        /**
         * Patch version.
         * 
         * Small releases containing mostly bug fixes or small code improvements.
         * The patch version MUST be backwards compatible. Otherwise, it's a
         * minor update.
         */
        const PATCH_VERSION = 1;
        
        /**
         * Gets the framework version.
         * 
         * @param  bool   $minor (Optional)
         * @param  bool   $patch (Optional)
         * @return string
         */
        public static function get($minor = true, $patch = false){
            $version = self::MAJOR_VERSION;
            
            if($minor){
                $version .= '.'.self::MINOR_VERSION;
                
                if($patch){
                   $version .= '.'.self::PATCH_VERSION;
                }
            }
            
            return $version;
        }
        
    }
    
}
