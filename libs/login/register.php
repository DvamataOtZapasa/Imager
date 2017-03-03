<?php
session_start();
require "../dbConfig.php";
$username = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$_SESSION['ERROR'] = "";

$result = mysqli_query($con,"SELECT none FROM users WHERE username=$username");
if(mysqli_num_rows($result) == 0){
    if($pass1 == $pass2){
        mysqli_query($con,"INSERT INTO `users` (`username`, `password`) VALUES ('asd', '123');");
    }else{
        $_SESSION['ERROR'] = "Passwords do not match;";
    }
}else{
    $_SESSION['ERROR'] = "Username already taken";
}
