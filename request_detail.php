<?php # script - request_detail.php

include('connect/pg_connect.php');

$page_title = 'Formulir Permohonan Sertifikat Digital';
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
      echo '<h1>Terima kasih</h1><p>Pengajuan permohonan sertifikat berhasil.</p><p><br /></p>';
    } else { // If it did not run OK.
      echo '<h1>Sistem error</h1><p class="error">Pengajuan permohonan sertifikat tidak berhasil. Maaf atas ketidaknyamanannya.</p>';

      echo '<p>' . pg_last_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
    }

    // Close connection
    pg_close($dbc);

    include('includes/footer.html');
    exit();

  } else {
    // Show the errors
    echo '<h1>Error!</h1><p class="error">Ada kesalahan yang terjadi:<br />';

    foreach ($errors as $msg) {
      echo " - $msg<br />\n";
    }

    echo '</p><p>Mohon ulangi pengisian.</p><p><br /></p>';
  }
}

?>

<h1>Pendaftaran</h1>
<form action="request_detail.php" method="post">
  <h3>Detail Organisasi</h3>
  <p>Domain organisasi: <input type="text" name="institution_cn" size="30" value="<?php if (isset($_POST['institution_cn'])) echo $_POST['institution_cn']; ?>" /></p>
  <p>Nama organisasi: <input type="text" name="institution_name" size="30" value="<?php if (isset($_POST['institution_name'])) echo $_POST['institution_name']; ?>" /></p>
  <p>Bidang organisasi: <input type="text" name="institution_unit" size="30" value="<?php if (isset($_POST['institution_unit'])) echo $_POST['institution_unit']; ?>" /></p>
  <p>Alamat organisasi: <input type="text" name="institution_address" size="30" value="<?php if (isset($_POST['institution_address'])) echo $_POST['institution_address']; ?>" /></p>
  <p>Kota/Lokasi: <input type="text" name="institution_city" size="30" value="<?php if (isset($_POST['institution_city'])) echo $_POST['institution_city']; ?>" /></p>
  <p>Provinsi/Region: <input type="text" name="institution_region" size="30" value="<?php if (isset($_POST['institution_region'])) echo $_POST['institution_region']; ?>" /></p>
  <p>Kode Pos: <input type="text" name="institution_zip" size="30" value="<?php if (isset($_POST['institution_zip'])) echo $_POST['institution_zip']; ?>" /></p>
  <p>Negara: <?php
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
  <p>Alamat e-mail: <input type="text" name="email" size="30" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
  <p>Nama Depan: <input type="text" name="first_name" size="30" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
  <p>Nama Belakang: <input type="text" name="last_name" size="30" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
  <p>Jabatan di organisasi: <input type="text" name="job_title" size="30" value="<?php if (isset($_POST['job_title'])) echo $_POST['job_title']; ?>" /></p>
  <p>Nomor telepon: <input type="text" name="telp_number" size="30" value="<?php if (isset($_POST['telp_number'])) echo $_POST['telp_number']; ?>" /></p>
  <p>Fax: <input type="text" name="fax_number" size="30" value="<?php if (isset($_POST['fax_number'])) echo $_POST['fax_number']; ?>" /></p><br />

  <h3>Detil Akun</h3>
  <p>Nama akun: <input type="text" name="akun" size="30" value="<?php if (isset($_POST['akun'])) echo $_POST['akun']; ?>" /></p>
  <p>Kata sandi: <input type="password" name="password1" size="10" maxlength="20" /></p>
  <p>Ulangi kata sandi: <input type="password" name="password2" size="10" maxlength="20" /></p><br />

  <p><input type="submit" name="submit" value="Daftar" /></p>
  <input type="hidden" name="submitted" value="TRUE" />
</form>

<?php
include('includes/footer.html')
?>
