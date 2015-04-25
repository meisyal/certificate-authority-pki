<?php # script - pg_connect.php

// This file contains the database access details.
// Set the database access details as constants:
$dbhost = 'localhost';
$dbport = 'port';
$dbname = 'dbname';
$dbuser = 'username';
$dbpass = 'password';

// Make the connection:
$dbc = pg_connect("host=$dbhost port=$dbport dbname=$dbname user=$dbuser password=$dbpass");

?>
