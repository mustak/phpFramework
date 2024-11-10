<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = [
  '/' => 'controllers/home.php',
  '/about' => 'controllers/home.php',
  '/contact' => 'controllers/home.php',

];

function routeToController($routes, $path)
{
  if (array_key_exists($path, $routes)) {

    require $routes[$path];
  } else {
    abort(404, 'Page not found');
  }
}
function abort($code = 404, $message = 'OOPS! Something went wrong')
{
  http_response_code($code);
  $heading = $message;
  require "views/{$code}.php";
}


routeToController($routes, $path);