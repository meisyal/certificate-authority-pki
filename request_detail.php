<?php # script - request_detail.php

$page_title = 'Pendaftaran Sertifikat Digital';
include('includes/header.html');

// Check the form before storing the data into database
if (isset($_POST['submitted'])) {

  // Initialize an error array
  $errors = array();

  // Cek nama lengkap
  if (empty($_POST['full_name'])) {
    $errors[] = 'Anda lupa memasukkan Nama Lengkap.';
  } else {
    $fullname = trim($_POST['full_name']);
  }

  // Cek nama instansi
  if (empty($_POST['institution'])) {
    $errors[] = 'Anda lupa memasukkan Nama Instansi.';
  } else {
    $institute = trim($_POST['institution']);
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

  // Cek public key
  if (empty($_POST['public_key'])) {
    $errors[] = 'Anda lupa memasukkan Nama Instansi.';
  } else {
    $pk = trim($_POST['public_key']);
  }

  // No error occured
  if (empty($errors)) {
    // Insert data into database
    // Open connection
    require_once('connect/pg_connect.php');

    // Make the query
    $q = "INSERT INTO request (nama_lengkap, nama_instansi, kata_sandi, public_key) VALUES ('$fullname', '$institute', SHA1('$password'), '$pk')";
    $r = pg_query($dbc, $q);

    if ($r) { // If it ran OK.
      echo '<h1>Terima kasih</h1><p>Pendaftaran sertifikat berhasil</p><p><br /></p>';
    } else { // If it did not run OK.
      echo '<h1>Sistem error</h1><p class="error">Pendaftaran tidak berhasil. Maaf atas ketidaknyamanannya.</p>';

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
<form action="register.php" method="post">
  <h3>Detail Organisasi</h3>
  <p>Domain organisasi: <input type="text" name="institution_cn" size="30" value="" /></p>
  <p>Nama organisasi: <input type="text" name="institution_name" size="30" value="<?php if (isset($_POST['institution'])) echo $_POST['institution']; ?>" /></p>
  <p>Bidang organisasi: <input type="text" name="" size="30" value="" /></p>
  <p>Alamat organisasi: <input type="text" name="institution_address" size="30" value="" /></p>
  <p>Kota/Lokasi: <input type="text" name="institution_city" size="30" value="" /></p>
  <p>Provinsi/Region: <input type="text" name="institution_region" size="30" value="" /></p>
  <p>Kode Pos: <input type="text" name="institution_zip" size="30" value="" /></p>
  <p>Negara: <select name="institution_country">
                <option value="id">Indonesia</option>
             </select>
  </p><br />

  <h3>Detail Pemohon (wakil organisasi)</h3>
  <p>Alamat e-mail: <input type="text" name="email" size="30" value="" /></p>
  <p>Nama Depan: <input type="text" name="full_name" size="30" value="<?php if (isset($_POST['full_name'])) echo $_POST['full_name']; ?>" /></p>
  <p>Nama Belakang: <input type="text" name="last_name" size="30" value="" /></p>
  <p>Jabatan di organisasi: <input type="text" name="job_title" size="30" value="" /></p>
  <p>Nomor telepon: <input type="text" name="tel_number" size="30" value="" /></p>
  <p>Fax: <input type="text" name="fax_number" size="30" value="" /></p><br />

  <h3>Akun</h3>
  <p>Nama akun: <input type="text" name="" size="30" value="" /></p>
  <p>Kata sandi: <input type="password" name="password1" size="10" maxlength="20" /></p>
  <p>Ulangi kata sandi: <input type="password" name="password2" size="10" maxlength="20" /></p><br />

  <p><input type="submit" name="submit" value="Daftar" /></p>
  <input type="hidden" name="submitted" value="TRUE" />
</form>

<?php
include('includes/footer.html')
?>
