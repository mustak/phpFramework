<?php

$router->get('/', 'home.php');
$router->get('/about', 'home.php');
$router->get('/contact', 'home.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
//delete
$router->delete('/note', 'notes/destroy.php');
//create
$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');
//update
$router->get('/notes/edit', 'notes/edit.php');
$router->patch('/notes', 'notes/update.php');

$router->get('/register', 'auth/create.php')->only('guest');
$router->post('/register', 'auth/store.php');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/login', 'session/store.php')->only('guest');
$router->delete('/logout', 'session/destroy.php')->only('auth');
