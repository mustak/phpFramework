<?php

use core\Authenticator;

Authenticator::logout();

header("Location: /");
exit;
