<?php # script - mysqli_connect.php

// This file contains the database access details.
// Set the database access details as constants:
$dbhost = 'localhost';
$dbname = 'dbname';
$dbuser = 'username';
$dbpass = 'password';

// Make the connection:
$dbc = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) OR die('Could not
       connect to MySQL: ' . mysqli_connect_error());

?>
