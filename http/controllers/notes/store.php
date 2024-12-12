<?php

use core\Database;
use core\Validator;
use core\App;
use core\Session;
use core\Router;

$db = App::resolve(Database::class);
$Validator = new Validator();
$errors = [];

if (!Validator::string($_POST['body'], 1, 30)) {
  $errors['body'] = 'Body must be between 1 and 1000[test 30] characters';
}

if (!empty($errors)) {
  Session::flash('errors', $errors);
  return Router::redirect('/notes/create');
}



$query = "INSERT INTO `notes` (`body`, `user_id`) VALUES
(:body, :userID)";

$note = $db->query($query, [
  ':userID' => 1,
  ':body' => $_POST['body']
]);

Router::redirect('/notes');
