<?php
require_once "rating.php";
require_once "../dbConfig.php";
$rating = $_POST['rating'];
$imageid = $_POST['imageid'];
rate($con,$imageid,$rating);
goHome();