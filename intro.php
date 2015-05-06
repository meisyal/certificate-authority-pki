<?php
session_start();

$page_title = 'Alur Permohonan YOLO CA';
include('includes/header.html');
?>
<!--Header-->

  <div class="container">
    <div class="row" style="padding-top: 100px;">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
          <h2>Alur Pengajuan Sertifikat Digital</h2>

          <p>Untuk melakukan permintaan sertifikat digital, Anda diminta untuk mengisi detil
          informasi yang dibutuhkan pada halaman <a href="request_detail.php">pendaftaran</a>.
          </p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include('includes/footer.html');
?>
