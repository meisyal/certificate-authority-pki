<?php
include('connect/pg_connect.php');

$page_title = 'Permohonan Sertifikat YOLO CA';
include('includes/header.html');

// Check the form before storing the data into database
if (isset($_POST['submitted'])) {

  // Initialize an error array
  $errors = array();

  // Cek domain organisasi
  if (empty($_POST['institution_cn'])) {
    $errors[] = 'Anda lupa memasukkan domain organisasi.';
  } else {
    $cn = trim($_POST['institution_cn']);
  }

  // Cek nama organisasi
  if (empty($_POST['institution_name'])) {
    $errors[] = 'Anda lupa memasukkan nama organisasi.';
  } else {
    $institution_name = trim($_POST['institution_name']);
  }

  // Cek unit organisasi
  if (empty($_POST['institution_unit'])) {
    $error[] = 'Anda lupa memasukkan unit organisasi.';
  } else {
    $institution_unit = trim($_POST['institution_unit']);
  }

  // Cek alamat organisasi
  if (empty($_POST['institution_address'])) {
    $errors[] = 'Anda lupa memasukkan alamat organisasi.';
  } else {
    $institution_addr = trim($_POST['institution_address']);
  }

  // Cek kota organisasi
  if (empty($_POST['institution_city'])) {
    $errors[] = 'Anda lupa memasukkan kota/lokasi organisasi.';
  } else {
    $institution_city = trim($_POST['institution_city']);
  }

  // Cek region organisasi
  if (empty($_POST['institution_region'])) {
    $errors[] = 'Anda lupa memasukkan provinsi/region organisasi.';
  } else {
    $institution_region = trim($_POST['institution_region']);
  }

  // Cek kode pos organisasi
  if (empty($_POST['institution_zip'])) {
    $errors[] = 'Anda lupa memasukkan kode pos organisasi.';
  } else {
    $institution_zip = trim($_POST['institution_zip']);
  }

  // Cek negara orgnisasi
  if ($_POST['institution_country'] == 'null') {
    $errors[] = 'Anda belum memasukkan pilihan negara.';
  } else {
    $institution_country = trim($_POST['institution_country']);
  }

  // Cek alamat e-mail pemohon
  if (empty($_POST['email'])) {
    $errors[] = 'Anda lupa memasukkan alamat e-mail.';
  } else {
    $email = trim($_POST['email']);
  }

  // Cek nama depan
  if (empty($_POST['first_name'])) {
    $errors[] = 'Anda lupa memasukkan nama depan.';
  } else {
    $firstname = trim($_POST['first_name']);
  }

  // Cek nama depan
  if (empty($_POST['last_name'])) {
    $errors[] = 'Anda lupa memasukkan nama belakang.';
  } else {
    $lastname = trim($_POST['last_name']);
  }

  // Cek jabatan organisasi
  if (empty($_POST['job_title'])) {
    $errors[] = 'Anda lupa memasukkan jabatan.';
  } else {
    $jobtitle = trim($_POST['job_title']);
  }

  // Cek nomor telepon
  if (empty($_POST['telp_number'])) {
    $errors[] = 'Anda lupa memasukkan nomor telepon.';
  } else {
    $telpnumber = trim($_POST['telp_number']);
  }

  // ambil fax
  $faxnumber = $_POST['fax_number'];

  // Cek nama akun
  if (empty($_POST['akun'])) {
    $errors[] = 'Anda lupa memasukkan nama akun.';
  } else {
    $accountname = trim($_POST['akun']);
  }

  // Cek kecocokan kata sandi
  if (!empty($_POST['password1'])) {
    if ($_POST['password1'] != $_POST['password2']) {
      $errors[] = 'Kata sandi Anda tidak sama.';
    } else {
      $password = trim($_POST['password1']);
    }
  } else {
    $errors[] = "Anda lupa memasukkan kata sandi.";
  }

  // No error occured
  if (empty($errors)) {
    // Insert data into database
    // Open connection
    require_once('connect/pg_connect.php');

    // Make the query
    $q = "SELECT save_data_pemohon('$institution_country', '$cn', '$institution_name', '$institution_unit', '$institution_addr', '$institution_city', '$institution_region', '$institution_zip', '$accountname', '$password', '$firstname', '$lastname', '$email','$jobtitle', '$telpnumber', '$faxnumber')";
    $r = pg_query($dbc, $q);

    if ($r) { // If it ran OK.
      echo "<div class=\"container\">
              <div class=\"row\" style=\"padding-top:100px;\">
                <div class=\"col-md-12\">
                  <div class=\"panel panel-default\">
                    <div class=\"panel-body\">";
      echo '<h1 style="text-align: center;">Terima kasih</h1><p>Pengajuan permohonan sertifikat berhasil.</p><p><br /></p>';
      echo "</div></div></div></div></div>";
    } else { // If it did not run OK.
      echo "<div class=\"container\">
              <div class=\"row\" style=\"padding-top:100px;\">
                <div class=\"col-md-12\">
                  <div class=\"panel panel-default\">
                    <div class=\"panel-body\">";
      echo '<h1>Sistem error</h1><p style="font-weight: bold; color: #C00; background: #f0f0c0; text-align: center;">Pengajuan permohonan sertifikat tidak berhasil. Maaf atas ketidaknyamanannya.</p>';
      echo "</div></div></div></div></div>";

      // echo '<p>' . pg_last_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
    }

    // Close connection
    pg_close($dbc);

    include('includes/footer.html');
    exit();

  } else {
    // Show the errors
    echo "<div class=\"container\">
            <div class=\"row\" style=\"padding-top:100px;\">
              <div class=\"col-md-12\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-body\">";
    echo '<h1>Error!</h1><p style="font-weight: bold; color: #C00; background: #f0f0c0; text-align: center;">Ada kesalahan yang terjadi:<br />';

    foreach ($errors as $msg) {
      echo " - $msg<br />\n";
    }

    echo '</p><p style="text-align: center;">Mohon ulangi pengisian.</p><p><br /></p>';
    echo "</div></div></div></div></div>";
  }
}

?>
<!--Header-->

  <div class="container">
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
                <input class="form-control" type="text" name="institution_unit" value="<?php if (isset($_POST['institution_unit'])) echo $_POST['institution_unit']; ?>" />
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
              </div>
            </div>

            <br />

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
                <input class="form-control" type="text" name="first_name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" />
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
                <input class="form-control" type="text" name="telp_number" value="<?php if (isset($_POST['telp_number'])) echo $_POST['telp_number']; ?>" />
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
                <input class="form-control" type="text" name="akun" value="<?php if (isset($_POST['akun'])) echo $_POST['akun']; ?>" />
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
              <br />

              <div class="pull-left">
                  <br /><input class="btn btn-success" type="submit" name="submit" value="Daftar"/>
                  <input type="hidden" name="submitted" value="TRUE" />
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


<?php
include('includes/footer.html');
?>
