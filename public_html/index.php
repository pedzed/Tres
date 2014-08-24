<?php

use Tres\core\Config;
use Tres\core\app\App;

require_once '../app/init.php';

// TODO: Move to view
if(Config::get('app/offline'))
    die('Sorry! The site is under maintenance.');

App::init();
