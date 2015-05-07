<?php # script - login.php

// Set page title
$page_title = 'Masuk';

// Include the header:
include('includes/header.html');

if (isset($_POST['submitted'])) {

  require_once('includes/login_functions.php');
  require_once('connect/pg_connect.php');

  if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
    $url = absolute_url('request_approval.php');
    header("Location: $url");
  } else if ($_POST['username'] != "admin") {
    list($check, $data) = check_login($dbc, $_POST['username'], $_POST['password']);

    if ($check) { // OK!
      // Set session data
      session_start();
      $_SESSION['nama_user'] = $data['nama_user'];

      // Redirect
      $url = absolute_url('csr_detail.php');
      header("Location: $url");
      exit();
    } else { // Unsuccessful!
      $errors = $data;
    }

    pg_close($dbc);
  }
}

// Print any error messages, if they exist:

if (!empty($errors)) {
  echo '<h1>Galat!</h1>
        <p style=\"font-weight: bold; color: #C00; background: #f0f0c0; text-align: center;\>Ada galat di bawah ini:<br />';
  foreach ($errors as $msg) {
    echo " - $msg<br />\n";
  }

  echo '</p><p>Ulangi kembali.</p>';
}

// Display the login form:
?>

  <div class="container">
    <div class="row" style="padding-top:100px;">
      <div class="col-md-12 ">
        <div class="panel panel-default">
          <div class="panel-body">
            <h1>Login</h1>
            <form action="login.php" method="post">
              <p>Nama user: <input type="text" name="username" size="20" /></p>
              <p>Kata sandi: <input type="password" name="password" size="20" /></p>
              <p><input class="btn btn-success" type="submit" name="submit" value="Masuk" /></p>
              <input type="hidden" name="submitted" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include('includes/footer.html');
?>
