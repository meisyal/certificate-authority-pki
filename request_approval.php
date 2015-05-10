<?php # - request_approval.php
session_start();

$page_title = 'Daftar Permohonan Sertifikat - Admin YOLO CA';
include('includes/admin_header.html');

include('connect/pg_connect.php');
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
                <?php
                  $q = "SELECT o.nama, o.cn, c.detil_isi, o.id_organisasi
                        FROM organisasi o, csr c, sertifikat s
                        WHERE o.id_organisasi = c.id_organisasi
                        AND o.id_organisasi = s.id_organisasi
                        AND s.status = 'Pending'";
                  $result = pg_query($dbc, $q);

                  while ($row = pg_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td><a href=\"../$row[2]\">klik di sini</a></td>";
                    echo "<td><form action=\"upload_cert.php\" method=\"get\"><input class=\"btn btn-success\" type=\"submit\" name=\"submit\" value=\"approve\" />
                          <input type=\"hidden\" name=\"org_id\" value=".$row[3]." /></form></td>";
                    echo "</tr>";
                  }
                ?>
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
