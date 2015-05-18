<?php # script - csr_detail.php
session_start();

// If no session value presents, redirect to
if (!isset($_SESSION['nama_user'])) {
  require_once('includes/login_functions.php');
  $url = absolute_url();
  header("Location: $url");
  exit();
}

$page_title = 'Detil CSR - User YOLO CA';
include('includes/user_header.html');

include('connect/pg_connect.php');

$username = $_SESSION['nama_user'];

if (isset($_POST['submitted'])) {
  if (isset($_FILES['csr'])) {
    if (move_uploaded_file($_FILES['csr']['tmp_name'], "csr/{$_FILES['csr']['name']}")) {
      $path = '../csr/' . basename($_FILES['csr']['name']);
      $q = "UPDATE csr SET detil_isi = '$path' WHERE id_organisasi = (SELECT id_organisasi FROM pemohon WHERE nama_user = '$username')";
      $result = pg_query($dbc, $q);

      pg_close($dbc);

      echo "<div class=\"container\">
              <div class=\"row\" style=\"padding-top:100px;\">
                <div class=\"col-md-12\">
                  <div class=\"panel panel-default\">
                    <div class=\"panel-body\">";
      echo "<h1>Berkas CSR berhasil diunggah</h1>";
      echo "Silahkan klik di <a href=\"status_cert.php\">sini</a>";
      echo "</div></div></div></div></div>";
    }
  }
}
?>

<div class="container">
  <div class="row" style="padding-top: 100px;">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
        <h1>Detil CSR</h1>
        <p>Untuk menghasilkan CSR, Anda bisa menggunakan kakas bantu, seperti OpenSSL.</p>
        <p>Berikut ini adalah contoh dari CSR:</p>
        <textarea rows="17" cols="80" readonly>
        -----BEGIN CERTIFICATE REQUEST-----
        MIICvDCCAaQCAQAwdzELMAkGA1UEBhMCVVMxDTALBgNVBAgMBFV0YWgxDzANBgNV
        BAcMBkxpbmRvbjEWMBQGA1UECgwNRGlnaUNlcnQgSW5jLjERMA8GA1UECwwIRGln
        aUNlcnQxHTAbBgNVBAMMFGV4YW1wbGUuZGlnaWNlcnQuY29tMIIBIjANBgkqhkiG
        9w0BAQEFAAOCAQ8AMIIBCgKCAQEA8+To7d+2kPWeBv/orU3LVbJwDrSQbeKamCmo
        wp5bqDxIwV20zqRb7APUOKYoVEFFOEQs6T6gImnIolhbiH6m4zgZ/CPvWBOkZc+c
        1Po2EmvBz+AD5sBdT5kzGQA6NbWyZGldxRthNLOs1efOhdnWFuhI162qmcflgpiI
        WDuwq4C9f+YkeJhNn9dF5+owm8cOQmDrV8NNdiTqin8q3qYAHHJRW28glJUCZkTZ
        wIaSR6crBQ8TbYNE0dc+Caa3DOIkz1EOsHWzTx+n0zKfqcbgXi4DJx+C1bjptYPR
        BPZL8DAeWuA8ebudVT44yEp82G96/Ggcf7F33xMxe0yc+Xa6owIDAQABoAAwDQYJ
        KoZIhvcNAQEFBQADggEBAB0kcrFccSmFDmxox0Ne01UIqSsDqHgL+XmHTXJwre6D
        hJSZwbvEtOK0G3+dr4Fs11WuUNt5qcLsx5a8uk4G6AKHMzuhLsJ7XZjgmQXGECpY
        Q4mC3yT3ZoCGpIXbw+iP3lmEEXgaQL0Tx5LFl/okKbKYwIqNiyKWOMj7ZR/wxWg/
        ZDGRs55xuoeLDJ/ZRFf9bI+IaCUd1YrfYcHIl3G87Av+r49YVwqRDT0VDV7uLgqn
        29XI1PpVUNCPQGn9p/eX6Qo7vpDaPybRtA2R7XLKjQaF9oXWeCUqy1hvJac9QFO2
        97Ob1alpHPoZ7mWiEuJwjBPii6a9M9G30nUo39lBi1w=
        -----END CERTIFICATE REQUEST----->
        </textarea>

        <form enctype="multipart/form-data" action="csr_detail.php" method="post">
          <input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
          <fieldset><legend>Pilih file CSR Anda yang akan diunggah</legend>
            <p><b>Berkas:</b> <input type="file" name="csr" /></p>
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
