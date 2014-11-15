# Tres Framework

*Note: This is heavily in development. Codebase is unstable and might change
at any time.*

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
   PUBLIC_URL points to the root of your domain name.
   So http://example.com/ should load /public_html/index.php


*Note that the RewriteBase of the htaccess file in the public directory might 
have to be changed.*


## Quick guide
### Configurations
#### Edit existing config
1. Go to the /app/config/ directory.
2. Edit the desired configurations.

#### Add new config
If you want to create a new configuration file, go to /app/init.php and 
add your file like the following.
```php
Config::add('my_alias', CONFIG_DIR.'/new-config-file.php'),
```

### Routing
#### Setting up routes
Open /app/routes.php and add your desired routes.

Routes may start and end with a slash. It does not make a difference.

Example routes:
```php
<?php
Route::get('/', function(){
    echo 'HOME!';
});

Route::get('/blog/posts/:id/', [
    'controller' => 'PostController',
    'method' => 'getPost'
]);
```
*Note that adding an argument like ":id" makes it mandatory. If you want to have 
them optional, you will have to create a new route without the argument.*

## To-do
The following list of features is likely to be added in future updates.

- Add template functionality, where layouts can be used for multiple pages.
- Implement validator.
- Implement file logger for error logging.
- Add application install wizard.
