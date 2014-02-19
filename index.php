<?php

// require composer autoloader
require(__DIR__ . '/autoload.php');

// load the dependency injection container
$container = require(__DIR__ . '/app/config/services.php');

// Configure AR
ActiveRecord\Config::initialize(function($ar) use ($container) {
    $config = $container->get('config');
    $ar->set_connections($config['databases']);
});

// This is our framework setup
// The first thing we want to do is load the appropiate controller and call
// the required function.
// There are several ways to accomplish this, for now let's add a formatting
// rule to our URLs, they must be in the following format
//
// http://mysite.com/index.php/{controller_class}/{function_name} 
// 
// Notice the index.php part, we can later remove this by using URL Rewriting.

// The first step is to fetch the requested URI, we can use PHP's $_SERVER array
// to get the REQUEST_URI, which will look something like /index.php/hello/world
$uri = $_SERVER['REQUEST_URI'];

// Make sure the $url always ends with '/'
if(strrpos($uri, '/') + 1 != strlen($uri)) {
    $uri .= '/';
}

// Let's jump straight to after index.php/, as that's the part we are concerned
// about
$route = substr($uri, strpos($uri, 'index.php/') + strlen('index.php/'));

// We can now get the controller and action
// Let's split the string using '/' as a delimiter, the first result is the
// controller, the second is the action
$params = explode('/', $route);

// If no controller is specified, use 'MainController'
$controller = 'App\\Controllers\\' . ($params[0] ? $params[0] : 'Main') . 'Controller';

// If no action is specified, use 'index'
$action = count($params) > 1 ? $params[1] : 'index';

$ctrl = new $controller($container);
$ctrl->$action();

