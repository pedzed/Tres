<?php

namespace Tres\core {
    
    /*
    |--------------------------------------------------------------------------
    | Framework version
    |--------------------------------------------------------------------------
    | 
    | Gives the option to get the framework version.
    | 
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
        const MINOR_VERSION = 8;
        
        /**
         * Patch version.
         * 
         * Small releases containing mostly bug fixes or small code improvements.
         * The patch version MUST be backwards compatible. Otherwise, it's a
         * minor update.
         */
        const PATCH_VERSION = 0;
        
        /**
         * Gets the framework version.
         * 
         * @param  bool   $minor (Optional)
         * @param  bool   $patch (Optional)
         * @return string
         */
        public static function get(){
            $version  = self::MAJOR_VERSION;
            $version .= '.'.self::MINOR_VERSION;
            
            if(self::PATCH_VERSION !== 0){
               $version .= '.'.self::PATCH_VERSION;
            }
            
            return $version;
        }
        
    }
    
}
