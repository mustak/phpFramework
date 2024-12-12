<?php

use core\HttpCode;
use core\Router;
use core\Session;

function dd($data)
{
  echo '<pre>';
  // print_r($data);
  var_dump($data);
  echo '</pre>';

  die();
}

function isUrl($value)
{
  global $uri;
  return $uri === $value;
}

function authorize($condition, $statusCode = HttpCode::FORBIDDEN)
{
  if (!$condition) {
    Router::abort($statusCode, 'Authorize: 403 Forbidden');
  }
}

function base_path($path)
{
  return __DIR__ . '/../' . $path;
  // return BASE_PATH . $path;
}

function view($path, $attr = [])
{
  extract($attr);
  require base_path('views/' . $path);
}

function old($key, $default = '')
{
  return Session::get('old')[$key] ?? $default;
}
