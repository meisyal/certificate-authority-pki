<?php # script - status_cert.php
session_start();

// If no session value presents, redirect to
if (!isset($_SESSION['nama_user'])) {
  require_once('includes/login_functions.php');
  $url = absolute_url();
  header("Location: $url");
  exit();
}

$page_title = 'Status Permohonan Sertifikat - User YOLO CA';
include('includes/user_header.html');

include('connect/pg_connect.php');

$username = $_SESSION['nama_user'];
?>
<!--Header-->

<div class="container">
  <div class="row" style="padding-top: 100px;">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
        <h1>Status Permohonan Sertifikat</h1>
        	 <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">NAMA ORGANISASI</th>
                  <th style="text-align:center;width:200px">DOMAIN ORGANISASI</th>
                  <th style="text-align:center;width:200px">CSR</th>
                  <th style="text-align:center;width:180px">STATUS</th>
                </tr>
                <tr>
                <?php
                  $q = "SELECT o.nama, o.cn, c.detil_isi, s.status
                        FROM organisasi o, pemohon p, csr c, sertifikat s
                        WHERE o.id_organisasi = p.id_organisasi
                        AND o.id_organisasi = c.id_organisasi
                        AND o.id_organisasi = s.id_organisasi
                        AND o.id_organisasi = (SELECT id_organisasi FROM pemohon WHERE nama_user = '$username')";
                  $result = pg_query($dbc, $q);

                  while ($row = pg_fetch_row($result)) {
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    if ($row[2] == 'Kosong') {
                      echo "<td>Belum dimasukkan</td>";
                    } else {
                      echo "<td><a href=\"../$row[2]\">klik di sini</a></td>";
                    }
                    echo "<td>$row[3]</td>";
                  }

                  pg_close($dbc);
                ?>
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
