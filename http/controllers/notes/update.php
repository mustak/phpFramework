<?php

use core\Database;
use core\Validator;
use core\App;
use core\Session;
use core\Router;

$db = App::resolve(Database::class);
$Validator = new Validator();
$errors = [];

$query = "SELECT * FROM notes WHERE id = :id";

$note = $db->query($query, [':id' => $_POST['id'] ?? 0])->findOrFail();

authorize($note['user_id'] === 1);

if (!Validator::string($_POST['body'], 1, 30)) {
  $errors['body'] = 'Body must be between 1 and 1000[test 30] characters';
}

if (!empty($errors)) {
  Session::flash('errors', $errors);
  return Router::redirect('/notes/edit');
}

$query = "UPDATE `notes` SET `body` = :body WHERE id = :id";

$note = $db->query($query, [
  ':id' => 1,
  ':body' => $_POST['body']
]);

Router::redirect('/notes');
