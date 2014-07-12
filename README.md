# Tres 0.3 (beta)

Tres is a well organized, powerful and highly extensible MVC framework for the 
PHP programming language.

The MVC (Model-View-Control) pattern allows you to easily reuse your code, 
because of its separation of concerns. As a web developer you only have 
to write your models once and you will be able to easily copy your models from 
project to project. Other developers can easily change the views without 
having to know much about PHP, or have to dig into the code.


## Requirements
- A web server with .htaccess support.
- The mod_rewrite module for .htaccess.
- PHP 5.4 or greater.


## Installation
1. Download the files and extract it to your web server.
2. If you are using this in a production environment, be sure that the
   "public_html" directory is the root directory.
   So http://example.com/ should load /public_html/index.php


*Note that the RewriteBase of the htaccess file in the public directory might 
have to be changed.


## Quick start
### Change/add configurations
1. Go to the /app/config/ directory.
2. Edit the necessary configurations.

If you want to create a new configuration file, go to /Tres/core/Config.php and 
simply add your file like so:
```php
'my_alias' => CONFIG_DIR.'/new-config-file.php',
```


### Setting up routes
Open /app/routes.php and add your desired routes.

Routes can start and end with a slash. It does not make a difference.

Example routes:
```php
$route->add('path/to/route', array(
    'uses' => 'MyController@controllerMethod'
));
```

```php
$route->add('users/:username', array(
    'uses' => 'User@getProfile'
));
```
*Note that parameters like ":username" are all required. If you want to have 
them optional, you will have to create a new route for each.*

## To-do
The following list of features is likely to be added in future updates.

- Add template functionality, where layouts can be used for multiple pages.
- Implement a mailing class.
- Implement file logger for error logging.
- Add application install wizard.
