<?php

use core\App;
use core\Container;
use core\Database;

$container = new Container();

$container->bind('core\Database', function () {
  return new Database();
});

App::setContainer($container);
