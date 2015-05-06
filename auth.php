<?php # script - auth.php

session_start();

// If no session value presents, redirect to
if (!isset($_SESSION['nama_user'])) {
  require_once('includes/login_functions.php');
  $url = absolute_url();
  header("Location: $url");
  exit();
}

$page_title = "Anda masuk...";
include('includes/header.html');
?>

<div class="container">
  <div class="row" style="padding-top:100px;">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-body">
          <h1>Anda masuk...</h1>
          <p>Selamat datang, <?php echo $_SESSION['nama_user']; ?>!</p>
          <p><a href="logout.php">Keluar</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?
include('includes/footer.html');
?>
