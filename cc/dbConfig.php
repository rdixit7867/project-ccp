<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'wanhywke_cc';
$dbPassword = 'Eduneev@23';
$dbName = 'wanhywke_cc';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>