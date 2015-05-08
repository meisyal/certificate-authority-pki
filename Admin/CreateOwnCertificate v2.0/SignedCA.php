
<?php
// Let's assume that this script is set to receive a CSR that has
// been pasted into a textarea from another page
$csrdata = file_get_contents("www_yolo_com.csr");

// We will sign the request using our own "certificate authority"
// certificate.  You can use any certificate to sign another, but
// the process is worthless unless the signing certificate is trusted
// by the software/users that will deal with the newly signed certificate

// We need our CA cert and its private key
$cacert = file_get_contents('ca.cert.pem');
$privkey = array(file_get_contents('ca.key.pem'), "yolo");

$usercert = openssl_csr_sign($csrdata, $cacert, $privkey, 365);

// Now display the generated certificate so that the user can
// copy and paste it into their local configuration (such as a file
// to hold the certificate for their SSL server)
openssl_x509_export($usercert, $certout);
echo $certout;
$myfile = fopen("cobalagi.crt", "w+");
$certnya=$certout;
fwrite($myfile, $certnya);
fclose($myfile);

// Show any errors that occurred here
while (($e = openssl_error_string()) !== false) {
    echo $e . "\n";
}
?>
