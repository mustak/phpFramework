<?php

namespace core;

use core\middleware\Middleware;

class Router
{
  protected $routes = [];

  public function get($uri, $controller)
  {
    return $this->addRoute($uri, $controller, 'GET');
  }

  public function post($uri, $controller)
  {
    return $this->addRoute($uri, $controller, 'POST');
  }

  public function delete($uri, $controller)
  {
    return $this->addRoute($uri, $controller, 'DELETE');
  }

  public function put($uri, $controller)
  {
    return $this->addRoute($uri, $controller, 'PUT');
  }

  public function patch($uri, $controller)
  {
    return  $this->addRoute($uri, $controller, 'PATCH');
  }

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

        Middleware::resolve($route['middleware']);

        return require base_path("http/controllers/" . $route['controller']);
      }
    }

    $this->abort(404, 'Sorry page not found');
  }

  private function addRoute($uri, $controller, $method)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null
    ];

    return $this;
  }

  public function only($key)
  {
    $this->routes[count($this->routes) - 1]['middleware'] = $key;

    return $this;
  }

  public static function redirect($uri)
  {
    header("Location: {$uri}");
    exit;
  }

  public static function abort($code = 404, $message = 'OOPS! Something went wrong')
  {
    http_response_code($code);
    $heading = $message;
    require base_path("views/{$code}.php");
  }
}
