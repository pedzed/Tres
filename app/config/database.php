<?php

return [
    
    'display_errors' => true,
    
    /*
    |--------------------------------------------------------------------------
    | Defaults
    |--------------------------------------------------------------------------
    | 
    | The default database connection you wish to use from the list of database
    | connections below.
    |
    */
    'default' => 'MySQL1',
    
    /*
    |--------------------------------------------------------------------------
    | Database connections
    |--------------------------------------------------------------------------
    | 
    | All databases require PDO support, but also, be sure that the driver for 
    | your particular database is installed on the server.
    | 
    | It's recommended to use an IP address for the host whenever possible, 
    | rather than a domain for faster performance.
    |
    */
    'connections' => [
        
        'MySQL1' => [
            'driver'    => 'MySQL',
            'database'  => 'tres',
            'host'      => '127.0.0.1',
            'port'      => '3306',
            'charset'   => 'utf8',
            'username'  => 'root',
            'password'  => 'password'
        ],
        
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Logging
    |--------------------------------------------------------------------------
    | 
    | Logs stuff to keep a record of events.
    |
    */
    'logs' => [
        'dir' => __DIR__.'/logs',
    ],
    
];
