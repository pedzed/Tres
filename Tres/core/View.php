<?php

namespace Tres\core {
    
    use Exception;
    use Tres\core\Config;
    use Tres\core\security\XSS\HTML;
    
    class ViewException extends Exception {}
    
    class View {
        
        /**
         * The content of the view.
         * 
         * @var string
         */
        protected static $_content = '';
        
        // Prevents instantiation
        private function __construct(){}
        private function __destruct(){}
        private function __clone(){}
        
        /**
         * Creates a view.
         * 
         * @param string $view      Path to the view.
         * @param array  $_viewData Data within the view.
         */
        public static function make($view, array $_viewData = array()){
            $view = VIEW_DIR.'/'.$view.'.php';
            self::_checkIsReadable($view);
            
            ob_start();
            require_once($view);
            self::$_content = ob_get_contents();
            ob_end_clean();
            
            self::_processVariables($_viewData);
            self::_processFunctions();
            
            //echo pd(HTML::specialchars(self::$_content));
            echo self::$_content;
        }
        
        /**
         * Checks if the given view is readable.
         * 
         * @param  string $view Path to the view.
         */
        protected static function _checkIsReadable($view){
            try {
                if(!is_readable($view)){
                    throw new ControllerException('View "'.$view.'" not found.');
                }
            } catch(ControllerException $e){
                // TODO: Log error to file.
                // TODO: Move to separate file.
                if(Config::get('app/debug') == 1){
                    echo $e->getMessage();
                } else if(Config::get('app/debug') == 2){
                    echo $e;
                }
            }
        }
        
        /**
         * Changes "{{ $var }}" to echoed PHP variables.
         * 
         * @param  array $_viewData The key/value pairs to process.
         */
        protected static function _processVariables(array $_viewData){
            // Strictly matches {{ $var }}
            $pattern = '#{{ \$(.+?) }}#';
            
            self::$_content = preg_replace_callback($pattern, function($var) use ($_viewData){
                if(isset($_viewData[$var[1]])){
                    return HTML::specialchars($_viewData[$var[1]]);
                } else {
                    throw new ViewException('No variable "$'.$var[1].'" exists.');
                }
            }, self::$_content);
        }
        
        protected static function _processFunctions(){
            $pattern = '#{{ ((\w+)\((.*?)\));? }}#';
            
            self::$_content = preg_replace_callback($pattern, function($func){
                //pd($func);
                if(function_exists($func[2])){
                    return call_user_func($func[2], $func[3]);
                } else {
                    throw new ViewException('No function "'.$func[1].'" exists.');
                }
            }, self::$_content);
        }
        
    }
    
}
