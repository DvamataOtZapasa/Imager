<?php
session_start();
//$user = addslashes($_POST['username']);
//$pass = md5(addslashes($_POST['pass1']));

$user = $_POST['username'];
$pass = $_POST['password'];

//$lastURL = str_replace("/site", "", $_SESSION['lastUrl']);
require '../dbConfig.php';

$q = mysqli_query($con, "SELECT * FROM $logT WHERE username='$user' AND password='$pass' LIMIT 1");
if(mysqli_num_rows($q)){
    $user = mysqli_fetch_assoc($q);
    $_SESSION['user'] = $user['username'];
    $_SESSION['id'] = $user['id'];
    header("location:../../");
}else{
    $_SESSION['LOGIN_ERROR']= "Wrong username or password";
    header("location:/");
}