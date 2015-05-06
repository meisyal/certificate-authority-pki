<!doctype html>
<?php
session_start();
?>
<html>
<head>
  <title>IT Corner - Forum IT Terkini!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(".alert").fadeOut(3000);
  </script>
</head>
<body>

  <div class="container">
    <!--Header-->
 <?php
include('includes/header.html');
?>
    <!--Header-->

<div class="row" style="padding-top:100px;">
      <div class="col-md-12 ">
        <div class="panel panel-default">
          <div class="panel-body">
          <?php
           if(isset($_GET['status']) && $_GET['status']=="kosong")
           {
            echo "<div class='alert alert-dismissable alert-danger fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            Isian tidak boleh kosong
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="gagal"){
            echo "<div class='alert alert-dismissable alert-danger fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Gagal!</b> Artikel anda gagal dimasukkan
            </div>";
           }
           ?>
          <h1>Content Title</h1>

  <p>This is where the page-specific content goes. This section will change from
    one page to the next.</p>

  <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
    deserunt mollit anim id est laborum."</p>

<br>
               
              
              </div>
              </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


<?php
include('includes/footer.html');
?>
    </div>
  </div>

  </body>
  </html>