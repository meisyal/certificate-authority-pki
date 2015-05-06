<?php # script - login.php

// Set page title
$page_title = 'Login';

// Include the header:
include('includes/header.html');

// Print any error messages, if they exist:

            session_start();

            //Mengambil parameter p dari loginhandling, untuk mencetak error proses login
            //p=1, Jika satu atau lebih isian kosong
            //p=2, Jika captcha salah
            //p=3, Jika captcha benar namun username sama password salah
            if(isset($_GET['p']))
            {
              $p = $_GET["p"];

              if($p=="1")
              {
                echo '<div class="alert alert-danger alert-dismissable fade in">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        Silahkan isi isian dengan lengkap</div>';
              }
              
              elseif($p=="2")
              {
                echo '<div class="alert alert-danger alert-dismissable fade in">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        ID atau Password yang Anda masukkan salah</div>';
              }
            }

          ?>

// Display the login form:
  <div class="container">
    <div class="row" style="padding-top:100px;">
      <div class="col-md-12 ">
        <div class="panel panel-default">
          <div class="panel-body">

           <form action="request_detail.php" method="POST">

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
