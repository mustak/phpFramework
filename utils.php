<?php

function dd($data)
{
  echo '<pre>';
  print_r($data);
  echo '</pre>';

  die();
}

function isUrl($value)
{
  global $path;
  return $path === $value;
}