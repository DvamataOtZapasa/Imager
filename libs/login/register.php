<?php
session_start();
require "../dbConfig.php";
$username = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$result = mysqli_query($con,"SELECT none FROM users WHERE username=$username");
