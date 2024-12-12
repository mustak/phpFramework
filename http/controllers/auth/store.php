<?php

use core\Database;
use core\Validator;
use core\App;
use core\Authenticator;
use core\Session;
use core\Router;

$db = App::resolve(Database::class);
$Validator = new Validator();
$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];

//validate inputs
if (!Validator::email($email)) {
  $errors['email'] = 'Please enter a valid email address';
}

if (!Validator::string($password, 6, 255)) {
  $errors['password'] = 'Password must be at least 6 characters';
}

//check if user already exists
$query = "SELECT * FROM users WHERE email = :email";
$user = $db->query($query, [':email' => $email])->find();

if ($user) {
  $errors['form'] = 'User already exists';
}

if (!empty($errors)) {
  Session::flash('errors', $errors);
  Session::flash('old', ['email' => $email]);
  return Router::redirect('/register');
}

//create user
$query = "INSERT INTO `users` (`email`, `password`) VALUES
(:email, :password)";

$newUser = $db->query($query, [
  ':email' => $email,
  ':password' => password_hash($password, PASSWORD_BCRYPT)
]);

Authenticator::login(['email' => $email]);

Router::redirect('/');
