<?php # script - login_functions.php

// This file defines two functions used by login/logout process.

function absolute_url($page = 'index.php') {
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

  // Remove any trailing slashes:
  $url = rtrim($url, '/\\');

  // Add the page:
  $url .= '/' .$page;

  return $url;
}

function check_login($dbc, $email = '', $pass = '') {
  // Initialize an error array
  $errors = array();

  // Validate each login data
  if (empty($email)) {
    $errors[] = 'Anda lupa memasukkan alamat e-mail.';
  } else {
    // Escape string into query
  }

  if (empty($password)) {
    $errors[] = 'Anda lupa memasukkan kata sandi.';
  } else {
    // Escape string into query
  }

  // If everything's OK.

  // Querying user_id for that email/password combination:

  return array(false, $errors);
}

?>
