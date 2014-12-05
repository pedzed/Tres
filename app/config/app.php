<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Application name
    |--------------------------------------------------------------------------
    | 
    | This is the name of your application.
    | 
    */
    'name' => 'Tres Framework',
    
    /*
    |--------------------------------------------------------------------------
    | Default timezone
    |--------------------------------------------------------------------------
    | 
    | For a complete list of timezones supported by PHP, see:
    | http://php.net/manual/en/timezones.php
    | 
    | Use "UTC" if you don't know which timezone to pick.
    |
    */
    'timezone' => 'Europe/Amsterdam',
    
    /*
    |--------------------------------------------------------------------------
    | Debug mode
    |--------------------------------------------------------------------------
    | 
    | In a production environment, be sure that this is NOT set to mode 2 
    | (Development). Showing error messages may scare your users off, but more 
    | importantly, it is a potential a security risk: it might give away too 
    | much sensitive information which may be used against you.
    | 
    | Production:  0 (Limited)
    | Default:     1 (Normal)
    | Development: 2 (Advanced)
    | 
    */
    'debug' => 2,
    
    /*
    |--------------------------------------------------------------------------
    | Offline switch
    |--------------------------------------------------------------------------
    | 
    | It's good to be able to immediately take the application down in case 
    | something goes terribly wrong. Well, here it is: the offline switch.
    | 
    */
    'offline' => false,
    
];
