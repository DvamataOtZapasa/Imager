<?php 
$dbHost = "localhost";
$dbName = "imager";

$logT = "users";

$dbUsername = "root";
$dbPass = "123456";

$con = mysqli_connect($dbHost,$dbUsername,$dbPass) or die ("could not connect to mysql");
mysqli_select_db($con,$dbName) or die ("no database");   
mysqli_query($con,"SET NAMES 'utf8'; CHARSET 'utf8';");


?>