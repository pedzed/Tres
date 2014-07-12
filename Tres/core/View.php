<?php

namespace Tres\core {
    
    use Exception;
    use Tres\core\Config;
    use Tres\core\security\XSS\HTML;
    
    class ViewException extends Exception {}
    
    class View {
        
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
            $content = ob_get_contents();
            ob_end_clean();
            
            self::_processVariables($_viewData);
            
            //echo pd(HTML::specialchars($content));
            echo $content;
        }
        
        protected static function _checkIsReadable($view){
            try {
                if(!is_readable($view)){
                    throw new ControllerException('View "'.$view.'" not found.');
                }
            } catch(ControllerException $e){
                // TODO: Log error to file.
                // TODO: Move to separate file
                if(Config::get('app/debug') == 1){
                    echo $e->getMessage();
                } else if(Config::get('app/debug') == 2){
                    echo $e;
                }
            }
        }
        
        protected static function _processVariables($content, array $_viewData = array()){
            // Strictly matches {{ $var }}
            $pattern = '#{{ \$(.+?) }}#';
            return preg_replace_callback($pattern, function($_variable) use ($_viewData){
                if(isset($_viewData[$_variable[1]])){
                    return HTML::specialchars($_viewData[$_variable[1]]);
                } else {
                    throw new ViewException('No variable "$'.$_variable[1].'" exists.');
                }
            }, $content);
        }
        
    }
    
}
