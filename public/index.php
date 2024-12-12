<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->safeLoad();

use core\Session;


session_start([
  'name' => 'noteses',
  'cookie_lifetime' => 60 * 20,
  // 'cookie_httponly' => true,
  'cookie_secure' => true,
  'cookie_samesite' => 'Lax',
]);



require BASE_PATH . 'core/utils.php';

// spl_autoload_register(function ($class) {
//   // dd($class);
//   $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//   require base_path("{$class}.php");
// });

require base_path('bootstrap.php');

$router = new \core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method_'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();
