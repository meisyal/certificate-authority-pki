<?php # script - csr_detail.php
session_start();

$page_title = 'Detil CSR - User YOLO CA';
include('includes/user_header.html');
?>

<div class="container">
  <div class="row" style="padding-top: 100px;">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
        <h1>Detil CSR</h1>
        <p>Untuk menghasilkan CSR, Anda bisa menggunakan kakas bantu, seperti OpenSSL.</p>
        <p>Berikut ini adalah contoh dari CSR:</p>
        <p><textarea rows="17" cols="65" readonly>
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
        </textarea></p>

        <form action="" method="post" name="csr_client">
          <p>Masukkan CSR Anda pada:<br /><textarea form="csr_client" rows="17" cols="65">
          Tempel CSR Anda di sini...</textarea></p>
          <p><input type="submit" name="submit" value="Lanjutkan" /></p>
          <input type="hidden" name="submitted" value="TRUE" />
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include('includes/footer.html');
?>
