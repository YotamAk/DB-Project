<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 //create a mySQL DB connection:
$dbhost = "localhost";
$dbuser = "yotam";
$dbpass = "1234";
$dbname = "dbproject";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

 //testing connection success
 if(mysqli_connect_errno()) {
    die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
 }
?>