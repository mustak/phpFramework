<?php
function dd($data)
{
  echo '<pre>';
  print_r($data);
  echo '</pre>';

  die();
}

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //$_SERVER['REQUEST_URI'];
$routes = [
  '/' => 'controllers/home.php',
];

require $routes[$path];
//dd($routes[$path]);