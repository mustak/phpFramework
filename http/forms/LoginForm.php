<?php

namespace http\forms;

use core\Validator;

class LoginForm
{
  protected $errors = [];

  public function validate($email, $password)
  {
    //validate inputs
    if (!Validator::email($email)) {
      $this->errors['email'] = 'Please enter a valid email address';
    }

    if (!Validator::string($password, 6, 255)) {
      $this->errors['password'] = 'Password must be at least 6 characters';
    }

    return empty($this->errors);
  } //end validate()

  public function getErrors()
  {
    return $this->errors;
  } //end getErrors()

  public function error($field, $message)
  {
    $this->errors[$field] = $message;
  }
}
