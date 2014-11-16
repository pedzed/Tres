<?php

return [

    'defaults' => [
        'connection' => 'server 1',
        'port'       => 25,
        'timeout'    => 300,
        'security'   => 'TLS'
    ],
    
    'connections' => [
    
        'server 1' => [
            'host'      => 'smtp.gmail.com',
            'port'      => 587,
            'username'  => 'example@gmail.com',
            'password'  => 'password'
        ],
        
        'server 2' => [
            'host'      => 'smtp.live.com',
            'port'      => 587,
            'username'  => 'example@outlook.com',
            'password'  => 'password'
        ],
        
        'server 3' => [
            'host'      => 'smtp.example.com',
            'username'  => 'email@example.com',
            'password'  => 'password',
            'security'  => 'none'
        ],
        
        
    ]
    
];
