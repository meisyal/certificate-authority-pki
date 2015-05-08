<?php
include('File/X509.php');

$x509 = new File_X509();
$x509->loadCA(file_get_contents('yolo.crt')); // see signer.crt
$cert = $x509->loadX509(file_get_contents('yolo.crt')); // see google.crt
echo $x509->validateSignature() ? 'valid' : 'invalid';
?>
