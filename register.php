<?php # script - register.php

$page_title = 'Pendaftaran Sertifikat Digital';
include('includes/header.html');

?>

<h1>Pendaftaran</h1>
<form action="register.php" method="post">
  <p>Nama Lengkap: <input type="text" name="full_name" size="30" /></p>
  <p>Nama Instansi: <input type="text" name="institution" size="30" /></p>
  <p>Kata sandi: <input type="password" name="password1" size="10" maxlength="20" /></p>
  <p>Ulangi kata sandi: <input type="password" name="password2" size="10" maxlength="20" /></p>
  <p>Public Key: <input type="text" name="public_key" /></p>
  <p><input type="submit" name="submit" value="Daftar" /></p>
</form>

<?php
include('includes/footer.html')
?>
