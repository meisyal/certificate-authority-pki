<?php # script - auth.php

// This file processes the login form submission.
if (isset(_POST['submitted'])) {
  require_once('includes/login_functions.php');

  // Connect to the database
  require_once('connect/pg_connect.php');

  // Check the login:
  list($check, $data) = check_login($dbc, $_POST['email'], $_POST['password']);

  if ($check) { // OK!
    // Set the cookies:
    // Redirect:
  } else {
    // Report the error.
    $errors = $data;
  }

  pg_close($dbc);
}

include('login.php');
?>
