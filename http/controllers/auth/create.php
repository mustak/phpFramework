<?php

use core\Session;

view('auth/register.view.php', [
  'heading' => 'Register',
  'errors' => Session::get('errors', [])
]);
