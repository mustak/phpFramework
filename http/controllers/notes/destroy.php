<?php

use core\Database;
use core\App;
use core\Router;

$db = App::resolve(Database::class);

$query = "SELECT * FROM notes WHERE id = :id";

$note = $db->query($query, [':id' => $_POST['id'] ?? 0])->findOrFail();

authorize($note['user_id'] === 1);

$db->query("DELETE FROM notes WHERE id = :id", [
  ':id' => $_POST['id'] ?? 0
]);

Router::redirect('/notes');
