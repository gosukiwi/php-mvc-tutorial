<?php

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
$controller = $params[0] ? $params[0] : 'Main';
// If no action is specified, use 'index'
$action = count($params) > 1 ? $params[1] : 'index';

// Now call the according controller
// First, append 'Controller' to the controller name, so we end up with names
// such as 'MainController', 'UsersController', etc.
$controller .= 'Controller';
// This is the path to the controller file
$ctrl_file = __DIR__ . '/app/controllers/' . $controller . '.php';

// If the controller does not exist, throw an exception
if(!file_exists($ctrl_file)) {
    throw new Exception("Controller $controller was not found.");
}

// If the controller does exist, include it and call the action/function
require($ctrl_file);
$ctrl = new $controller;
$ctrl->$action();

