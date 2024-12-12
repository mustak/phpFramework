<?php

namespace core;

use core\App;
use core\Session;

class Authenticator
{

  public function attempt($email, $password)
  {
    $query = "SELECT * FROM users WHERE email = :email";
    $user = App::resolve(Database::class)->query($query, [':email' => $email])->find();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $this->login($user);

        return true;
      }
    }

    return false;
  }

  public static function login($user)
  {
    $_SESSION['user'] = [
      'email' => $user['email']
    ];

    session_regenerate_id(true);
  }

  static public function logout()
  {
    Session::destroy();
  }

  public function check()
  {
    if (!$_SESSION['user'] ?? false) {
      header("Location: /");
      exit;
    }
  }
}
