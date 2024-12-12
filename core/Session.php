<?php

namespace core;

class Session
{

  public static function put($key, $value = null)
  {
    if (is_null($value)) {
      return $_SESSION[$key] ?? false;
    } else {
      $_SESSION[$key] = $value;
    }
  }

  public static function get($key, $default = false)
  {
    if (isset($_SESSION['_flash'][$key])) {
      return $_SESSION['_flash'][$key];
    }
    return $_SESSION[$key] ?? $default;
  }

  public static function has($key)
  {
    return isset($_SESSION[$key]);
  }

  public static function flash($key, $value = null)
  {

    $_SESSION['_flash'][$key] = $value;
  }

  public static function unflash()
  {
    unset($_SESSION['_flash']);
  }

  public static function flush()
  {
    $_SESSION = [];
  }

  public static function destroy()
  {
    self::flush();
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('noteses', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
  }
}
