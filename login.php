<?php # script - login.php

// Set page title
$page_title = 'Login';

// Include the header:
include('includes/header.html');

// Print any error messages, if they exist:
if (!empty($errors)) {
  echo '<h1>Error!</h1>
        <p class="error">Ada kesalahan yang terjadi:<br />';
  foreach($errors as $msg) {
    echo " - $msg<br />\n";
  }

  echo '</p><p>Mohon ulangi kembali.</p>';
}
?>

// Display the login form:
<h1>Login</h1>
<form action="auth.php" method="post">
  <p>Nama user: <input type="text" name="email" size="20" /></p>
  <p>Kata sandi: <input type="password" name="password" size="20" /></p>
  <p><input type="submit" name="submit" value="Login" /></p>
  <input type="hidden" name="submitted" value="TRUE" />
</form>

<?php
include('includes/footer.html');
?>
