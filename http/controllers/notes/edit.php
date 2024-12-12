<?php

use core\Database;
use core\App;
use core\Session;

$db = App::resolve(Database::class);

$query = "SELECT * FROM notes WHERE id = :id";

$note = $db->query($query, [':id' => $_GET['id'] ?? 0])->findOrFail();

authorize($note['user_id'] === 1);

view('notes/edit.view.php', [
  'heading' => 'My Note',
  'errors' => Session::get('errors', []),
  'note' => $note
]);
