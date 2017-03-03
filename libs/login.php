<?php
session_start();
//$user = addslashes($_POST['username']);
//$pass = md5(addslashes($_POST['pass1']));

$user = $_POST['username'];
$pass = $_POST['pass'];

//$lastURL = str_replace("/site", "", $_SESSION['lastUrl']);
require 'php/dbConfig.php';

$q = mysqli_query($con, "SELECT * FROM $logT WHERE username='$user' AND password='$pass' LIMIT 1");
if(mysqli_num_rows($q)){
    $user = mysqli_fetch_assoc($q);
    $_SESSION['user'] = $user['username'];
    goToLastVisited();
}else{
    $_SESSION['error']= "Грешно име или парола!";
    goToLastVisited();
}