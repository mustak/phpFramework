<?php

namespace core\middleware;

class Middleware
{
  const MAP = [
    'auth' => Auth::class,
    'guest' => Guest::class
  ];

  public static function resolve($key)
  {
    if (!$key) {
      return;
    }
    $class = self::MAP[$key] ?? false;

    if (!$class) {
      throw new \Exception("No middleware found: {$key}.");
    }

    (new $class())->handle();
  }
}
