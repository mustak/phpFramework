<?php

return [
  'database' => [
    'host' => $_ENV['host'] ?? 'localhost',
    'port' => $_ENV['DB_port'] ?? 3306,
    'socket' => '',
    'user' => $_ENV['DB_user'] ?? 'root',
    'password' => $_ENV['DB_password'],
    'dbname' => $_ENV['DB_dbname'],
    'charset' => $_ENV['DB_charset'] ?? 'utf8mb4'
  ]
];
