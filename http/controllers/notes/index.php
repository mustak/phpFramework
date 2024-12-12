<?php

use core\Database;
use core\App;
// $db = new Database();
$db = App::resolve(Database::class);

$id = $_GET['id'] ?? 1;
$query = "SELECT * FROM notes WHERE user_id = :id";

$notes = $db->query($query, [':id' => $id])->findAll();

view(
  'notes/index.view.php',
  [
    'heading' => 'My Notes',
    'notes' => $notes
  ]

);
