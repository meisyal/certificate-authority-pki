<?php # - request_approval.php
session_start();

$page_title = 'Daftar Permohonan Sertifikat - Admin YOLO CA';
include('includes/admin_header.html');
?>
<!--Header-->

<div class="container">
  <div class="row" style="padding-top: 100px;">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
        <h1>Daftar Permohonan Sertifikat</h1>
         <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">NAMA ORGANISASI</th>
                  <th style="text-align:center;width:200px">DOMAIN ORGANISASI</th>
                  <th style="text-align:center;width:200px">CSR</th>
                  <th style="text-align:center;width:180px">KONFIRMASI</th>
                  
                </tr>

              </thead>
          </table>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include('includes/footer.html');
?>