<?php

namespace packages\Tres\database\drivers\mysql {
    
    use PDOException;
    
    use packages\Tres\database\drivers\AbstractDriver;
    use packages\Tres\database\drivers\QueryInterface;
    
    class QueryException {}
    
    class Query extends AbstractDriver implements QueryInterface {
        
        /**
         * Statement handle.
         * 
         * @var object
         */
        protected $_sth = null;
        
        /**
         * Sets the database connection.
         * 
         * @param object $conn
         */
        public function __construct($conn, $sql, $bindings = array()){
            $this->_sth = $conn->prepare($sql);
            
            if(!empty($bindings)){
                if(is_array($bindings)){
                    $i = 1;
                    
                    foreach($bindings as $binding){
                        $this->_sth->bindValue($i, $binding);
                        $i++;
                    }
                } else {
                    $this->_sth->bindValue(1, $bindings);
                }
            }
        }
        
        public function __call($method, $args){
            try {
                $this->_sth->execute();
                return call_user_func_array([$this->_sth, $method], $args);
            } catch(PDOException $e){
                return $e;
            } catch(QueryException $e){
                return $e;
            }
        }
        
    }
    
}

