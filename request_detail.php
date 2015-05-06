<!doctype html>
<?php
session_start();
?>
<html>
<head>
  <title>YOLO Certificate</title>
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
     
           <form action="request_detail.php" method="POST">
      <h3>Detail Organisasi</h3>
            <div class="form-group">
              <label class="control-label">Domain organisasi: </label>
              <div class="controls">
                <input class="form-control" type="text" name="institution_cn" value="<?php if (isset($_POST['institution_cn'])) echo $_POST['institution_cn']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Nama organisasi: </label>
              <div class="controls">
                <input class="form-control" type="text" name="institution_name" value="<?php if (isset($_POST['institution_name'])) echo $_POST['institution_name']; ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class="control-label">Bidang organisasi: </label>
              <div class="controls">
                <input class="form-control" type="text" name="" value="<?php if (isset($_POST['institution_unit'])) echo $_POST['institution_unit']; ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class="control-label">Alamat organisasi: </label>
              <div class="controls">
                <input class="form-control" type="text" name="institution_address" value="<?php if (isset($_POST['institution_address'])) echo $_POST['institution_address']; ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class="control-label">Kota/Lokasi: </label>
              <div class="controls">
                <input class="form-control" type="text" name="institution_city" value="<?php if (isset($_POST['institution_city'])) echo $_POST['institution_city']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Provinsi/Region: </label>
              <div class="controls">
                <input class="form-control" type="text" name="institution_region" value="<?php if (isset($_POST['institution_region'])) echo $_POST['institution_region']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Kode Pos: </label>
              <div class="controls">
                <input class="form-control" type="text" name="institution_zip" value="<?php if (isset($_POST['institution_zip'])) echo $_POST['institution_zip']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Negara: </label>
              <div class="controls">
                <input class="form-control" type="text" name="institution_zip">
              </div>
            </div>
         <?php
                $q = "SELECT * FROM negara";
                $result = pg_query($dbc, $q);

                echo '<select name="institution_country">';
                echo '<option value="null">Pilih negara</option>';
                while ($row = pg_fetch_row($result)) {
                    echo '<option value="' . htmlspecialchars($row[0]) . '">' . htmlspecialchars($row[1]) . '</option>';
                }
                echo "</select>";

                pg_close($dbc);
             ?>
  </p><br />
  
  <h3>Detail Pemohon (wakil organisasi)</h3>
            <div class="form-group">
              <label class="control-label">Alamat e-mail: </label>
              <div class="controls">
                <input class="form-control" type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Nama Depan: </label>
              <div class="controls">
                <input class="form-control" type="text" name="full_name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class="control-label">Nama Belakang: </label>
              <div class="controls">
                <input class="form-control" type="text" name="last_name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class="control-label">Jabatan di organisasi: </label>
              <div class="controls">
                <input class="form-control" type="text" name="job_title" value="<?php if (isset($_POST['job_title'])) echo $_POST['job_title']; ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class="control-label">Nomor telepon: </label>
              <div class="controls">
                <input class="form-control" type="text" name="tel_number" value="<?php if (isset($_POST['telp_number'])) echo $_POST['telp_number']; ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class="control-label">Fax:</label>
              <div class="controls">
                <input class="form-control" type="text" name="fax_number" value="<?php if (isset($_POST['fax_number'])) echo $_POST['fax_number']; ?>" />
              </div>
            </div>

                <h3>Detil Akun</h3>
                 <div class="form-group">
              <label class="control-label">Nama akun: </label>
              <div class="controls">
                <input class="form-control" type="text" name="" value="<?php if (isset($_POST['akun'])) echo $_POST['akun']; ?>" />
              </div>
               <div class="form-group">
              <label class="control-label">Kata sandi: </label>
              <div class="controls">
                <input class="form-control" type="password" name="password1" maxlength="20" />
              </div>
              <div class="form-group">
              <label class="control-label">Ulangi kata sandi: </label>
              <div class="controls">
                <input class="form-control" type="password" name="password2" maxlength="20" />
              </div>
<br>
               
              <div class="pull-right">
                  <br><input class="btn btn-success" type="submit" value="Daftar"/>
                  
                </div>
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