<?php # script - download_cert.php
session_start();

$page_title = 'Unduh Permohonan Sertifikat - User YOLO CA';
include('includes/user_header.html');

include('connect/pg_connect.php');
?>
<!--Header-->

<div class="container">
  <div class="row" style="padding-top: 100px;">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
        <h1>Unduh Permohonan Sertifikat</h1>
        <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">DOMAIN ORGANISASI</th>
                  <th style="text-align:center;">SERTIFIKAT</th>
                  <th style="text-align:center;">STATUS</th>
              </tr>
              <tr>
              <?php
                $q = "SELECT o.cn, s.berkas, s.status
                      FROM organisasi o, sertifikat s
                      WHERE o.id_organisasi = s.id_organisasi
                      AND o.id_organisasi = 1";
                $result = pg_query($dbc, $q);

                while ($row = pg_fetch_array($result)) {
                  echo "<td>$row[0]</td>";
                  echo "<td><a href=\"../$row[1]\">$row[1]</a></td>";
                  echo "<td>$row[2]</td>";
                }

                pg_close($dbc);
              ?>
              </tr>
          </thread>
      </table>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include('includes/footer.html');
?>
