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

function check_login($dbc, $username = '', $password = '') {
  // Initialize an error array
  $errors = array();

  // Validate each login data
  if (empty($username)) {
    $errors[] = 'Anda lupa memasukkan nama akun.';
  } else {
    // Escape string into query
    $u = pg_escape_string($dbc, trim($username));
  }

  if (empty($password)) {
    $errors[] = 'Anda lupa memasukkan kata sandi.';
  } else {
    // Escape string into query
    $p = pg_escape_string($dbc, trim($password));
  }

  // If everything's OK.
  if (empty($errors)) {
    $q = "SELECT nama_user FROM pemohon WHERE nama_user='$u' AND kata_sandi= crypt('$p', kata_sandi) AND peranan = 'pemohon'";
    $r = pg_query($dbc, $q);

    $s = "SELECT nama FROM akun WHERE nama='$u' AND kata_sandi= crypt('$p', kata_sandi)";
    $t = pg_query($dbc, $s);

    // Check the result
    if (pg_num_rows($r) == 1) {
      $row = pg_fetch_array($r, NULL, PGSQL_ASSOC);

      return array(true, pemohon, $row);
    } else if (pg_num_rows($t) == 1) {
      $row = pg_fetch_array($t, NULL, PGSQL_ASSOC);

      return array(true, admin, $row);
    } else {
      $errors[] = 'Kombinasi nama akun dan kata sandi Anda tidak cocok.';
    }
  }

  // Querying user_id for that email/password combination:

  return array(false, $errors);
}

?>
