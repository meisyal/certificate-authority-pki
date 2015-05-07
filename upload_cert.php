<?php # script - upload_cert.php
session_start();

$page_title = 'Unggah Permohonan Sertifikat - Admin YOLO CA';
include('includes/admin_header.html');

include('connect/pg_connect.php');

$org_id = $_GET['org_id'];

if (isset($_POST['submitted'])) {
  if (isset($_FILES['cert'])) {
    if (move_uploaded_file($_FILES['cert']['tmp_name'], "certificates/{$_FILES['cert']['name']}")) {
      $path = 'certificate-authority-pki/certificates/' . basename($_FILES['cert']['name']);
      $q = "UPDATE sertifikat SET berkas = '$path' WHERE id_organisasi = $org_id";
      $result = pg_query($dbc, $q);

      pg_close($dbc);

      echo "<div class=\"container\">
              <div class=\"row\" style=\"padding-top:100px;\">
                <div class=\"col-md-12\">
                  <div class=\"panel panel-default\">
                    <div class=\"panel-body\">";
      echo "<h1>Berkas Certificate berhasil diunggah</h1>";
      echo "</div></div></div></div></div>";
    }
  }
}
?>
<!--Header-->

<div class="container">
  <div class="row" style="padding-top: 100px;">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
        <h1>Unggah Permohonan Sertifikat</h1>
        	<table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">SERTIFIKAT</th>
                </tr>
              </thead>
          </table>
          <form enctype="multipart/form-data" action="upload_cert.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
            <fieldset><legend>Pilih file sertifikat Anda yang akan diunggah</legend>
              <p><b>Berkas:</b> <input type="file" name="cert" /></p>
            </fieldset>

            <div class="pull-left">
              <input class="btn btn-success" type="submit" name="submit" value="Unggah" />
              <input type="hidden" name="submitted" value="TRUE" />
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
