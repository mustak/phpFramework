<?php

use core\Session;

view('notes/create.view.php', [
  'heading' => 'Create Notex',
  'errors' => Session::get('errors', [])
]);
