<?php

namespace core;

use PDO;
use core\Router;

class Database
{
  protected $conn;
  protected $statement;

  public function __construct(array $config = [])
  {
    $configEnv = require base_path('config.php');
    $config = array_merge($configEnv['database'], $config);


    $dsn = "mysql:" . http_build_query($config, '', ';');

    $this->conn = new PDO($dsn, $config['user'], $config['password'], [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]) or die('Could not connect to the database server' . mysqli_connect_error());
  }

  function query($query, $params = [])
  {
    $this->statement = $this->conn->prepare($query);
    $this->statement->execute($params);

    return $this; //$statement;
  }

  public function find()
  {
    return $this->statement->fetch();
  }

  public function findOrFail()
  {
    $result =  $this->find();
    if (!$result) {
      Router::abort(404, 'FindOrFail: Note not found.');
    }
    return $result;
  }

  public function findAll()
  {
    return $this->statement->fetchAll();
  }
}
