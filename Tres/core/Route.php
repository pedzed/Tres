<?php

namespace Tres\core {
    
    class RouteException extends \Exception {}
    
    final class Route {
        
        /**
         * The current path from the URL.
         * 
         * @var string
         */
        protected static $_path = '';
        
        /**
         * The current route.
         * 
         * @var string
         */
        protected static $_route = '';
        
        /**
         * The application routes.
         * 
         * @var array
         */
        protected static $_routes = array();
        
        /**
         * The controller to instantiate.
         * 
         * @var string
         */
        protected static $_controller = 'ErrorNotFoundController';
        
        /**
         * The method to call from the chosen controller.
         * 
         * @var string
         */
        protected static $_method = 'renderPage';
        
        /**
         * Parameters to pass to the method.
         * 
         * @var array
         */
        protected static $_params = array();
        
        /**
         * The namespace used to call the controllers.
         */
        const CONTROLLER_NS = 'app\controllers\\';
        
        // Prevents instantiation
        private function __construct(){}
        private function __destruct(){}
        private function __clone(){}
        
        /**
         * Sets the path.
         * 
         * @param string $path The path which is being accessed.
         */
        public static function setPath($path){
            self::$_path = $path;
        }
        
        /**
         * Adds a route to the list of routes.
         * 
         * @param string $path    The URL to go to.
         * @param array  $options The route options.
         */
        public static function add($path, array $options = array()){
            if(!isset($options['uses'])){
                throw new RouteException('Controller and method are not specified.');
            }
            
            list($controller, $method) = explode('@', $options['uses']);
            
            if(!is_readable(CONTROLLER_DIR.'/'.$controller.'.php')){
                throw new RouteException('Controller "'.$controller.'" is not found.');
            }
            
            // Add namespace
            $controllerNS = self::CONTROLLER_NS.$controller;
            
            if(!method_exists($controllerNS, $method)){
                throw new RouteException('Method "'.$method.'" does not exist in the "'.$controllerNS.'" controller.');
            }
            
            $path = ($path === '/') ? $path : trim($path, '/');
            self::$_routes[$path] = array(
                'controller' => $controller,
                'method' => $method
            );
            
            if(isset($options['as'])){
                self::$_routes[$path]['alias'] = $options['as'];
            }
        }
        
        /**
         * Calls the chosen controller with the chosen method.
         */
        public static function find(){
            // Change the default controller, method and its parameters if the path 
            // is valid.
            if(array_key_exists(self::$_path, self::$_routes)){
                self::$_params = array();
                self::_changeDefaults();
            } else {
                foreach(self::$_routes as $route => $v){
                    self::$_route = $route;
                    
                    // Get arrays out of the strings
                    $splitRoute = explode('/', self::$_route);
                    $splitPath = explode('/', self::$_path);
                    
                    if($params = self::_getParams($splitRoute, $splitPath)){
                        self::$_params = $params;
                        self::_changeDefaults();
                    }
                }
            }
            
            $controllerNS = self::CONTROLLER_NS.self::$_controller;
            self::$_controller = new $controllerNS(self::$_params);
            
            // Call the chosen method on the chosen controller, passing in the 
            // parameters array.
            call_user_func_array(
                array(
                    self::$_controller,
                    self::$_method
                ),
                self::$_params
            );
        }
        
        /**
         * Gets the list of routes.
         * 
         * @return array
         */
        public static function getRoutes(){
            return self::$_routes;
        }
        
        /**
         * Changes the default controller and method.
         */
        protected static function _changeDefaults(){
            $route = (!empty(self::$_route)) ? self::$_route : self::$_path;
            
            self::$_controller = self::$_routes[$route]['controller'];
            self::$_method = self::$_routes[$route]['method'];
        }
        
        /**
         * Checks the path and gets the parameters.
         * 
         * @param  array $splitRoute The route array to check from.
         * @param  array $splitPath  The path array to check from.
         * @return array             Returns the parameters on success.
         * @return bool              Returns false on failure.
         */
        protected static function _getParams(array $splitRoute, array $splitPath){
            // Checks if all parameters are set and checks if the first part
            // of path matches recursively.
            if(count($splitPath) == count($splitRoute)){
                if(current($splitRoute) === current($splitPath)){
                    // Removes the non-variables
                    unset($splitRoute[array_keys($splitRoute)[0]]);
                    unset($splitPath[array_keys($splitPath)[0]]);
                    reset($splitRoute);
                    reset($splitPath);
                    
                    return self::_getParams($splitRoute, $splitPath);
                } else {
                    $firstSplitRoute = reset($splitRoute);
                    
                    // Checks if it really starts with a colon
                    if(isset($firstSplitRoute[0]) && $firstSplitRoute[0] === ':'){
                        // Create key value pairs
                        // ":variable" and "value" becomes ['variable' => 'value']
                        $values = [];
                        
                        foreach($splitRoute as $k => $singleSplitRoute){
                            if(isset($splitPath[$k])){
                                $values[str_replace(':', '', $singleSplitRoute)] = $splitPath[$k];
                            }
                        }
                        
                        return $values;
                    }
                }
            }
            
            return false;
        }
        
    }
    
}
