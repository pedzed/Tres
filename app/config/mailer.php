<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Defaults
    |--------------------------------------------------------------------------
    | 
    | If you don't add a certain configuration, it will get the configuration
    | from this default list. 
    |
    */
    'defaults' => [
        'connection' => 'server 1',
        'port'       => 587,
        'timeout'    => 300,
        'security'   => 'TLS'
    ],
    
    /*
    |--------------------------------------------------------------------------
    | SMTP connections
    |--------------------------------------------------------------------------
    | 
    | In order to be able to send SMTP mail, you have to configure this so the 
    | mail application can authenticate with the server.
    |
    */
    'connections' => [
    
        'server 1' => [
            'host'      => 'smtp.gmail.com',
            'username'  => 'example@gmail.com',
            'password'  => 'password'
        ],
        
        'server 2' => [
            'host'      => 'smtp.live.com',
            'username'  => 'example@outlook.com',
            'password'  => 'password'
        ],
        
        'server 3' => [
            'host'      => 'smtp.example.com',
            'port'      => 25,
            'username'  => 'email@example.com',
            'password'  => 'password',
            'security'  => 'none'
        ],
        
    ],
    
];
