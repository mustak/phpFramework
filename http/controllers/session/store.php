<?php

use http\forms\LoginForm;
use core\Authenticator;
use core\Router;
use core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
$authenticator = new Authenticator();

if ($form->validate($email, $password)) {

  if ($authenticator->attempt($email, $password)) {
    Router::redirect('/');
  }

  $form->error('email', 'No matching account found. Try again.');
}

Session::flash('errors', $form->getErrors());

return Router::redirect('/login');
