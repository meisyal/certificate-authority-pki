<?php # script - logout.php

session_start();

// if no session value presents, redirect to
if (!isset($_SESSION['nama_user'])) {
  require_once('includes/login_functions.php');
  $url = absolute_url();
  header("Location: $url");
  exit();
} else { // Cancel the session
  $_SESSION = array();
  session_destroy();
  setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0);
}

$page_title = 'Anda keluar...';
include('includes/header.html');
?>

<div class="container">
  <div class="row" style="padding-top:100px;">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-body">
          <h1>Anda telah berhasil keluar...</h1><p>Tekan <a href="index.php">di sini</a> untuk
            melanjutkan.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/footer.html');
?>
