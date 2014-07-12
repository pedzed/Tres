<?php

namespace Tres\core {
    
    /**
     * Configuration class.
     * 
     * Gets the configuration from a certain file.
     */
    class Config {
        
        /**
         * The paths to the configuration files.
         * 
         * @var array
         */
        protected static $_paths = array();
        
        // Prevent instantiation
        private function __construct(){}
        private function __destruct(){}
        private function __clone(){}
        
        /**
         * Sets the configuration paths. The configuration files do not necessarily 
         * have to be in the app/config folder, but it is recommended.
         */
        protected static function _setPaths(){
            self::$_paths = array(
                'app' => CONFIG_DIR.'/app.php',
                'db' => CONFIG_DIR.'/db.php', 
            );
        }
        
        /**
         * Gets the requested configuration by using the "root/branch/leaf" notation.
         * 
         * @param  string $path The path to the configuration.
         * @return mixed        On success: configuration value (string|array).
         *                      On failure: null
         */
        public static function get($path){
            self::_setPaths();
            
            try {
                $splitPath = explode('/', $path);
                $config = new ArrayObjectExt(
                    // TODO: Check if the root path actually exists.
                    File::inc(self::$_paths[$splitPath[0]])
                );
                
                if(!is_object($config->getPathValue($path))){
                    return $config->getPathValue($path);
                }
            } catch(FileException $e){
                $e->getMessage();
                // TODO: Error logging.
            }
            
            // The config likely doesn't exist if the code reaches this part.
            // TODO: Error logging.
            return null;
        }
        
    }
    
}
