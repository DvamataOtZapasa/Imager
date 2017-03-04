<?php
session_start();
require_once "libs/dbConfig.php"

?>
<html>
<head>
    <title>Imager</title>
    <link type="text/css" rel="stylesheet" href="css/main.css" >
</head>
<body>
<?php
require_once "content/menu.php"
?>
<div id="container">

    <?php
    if(isLogged()){
        goHome();
    }else{
        ?>
        <p id="errorMessage"><?php if(isset($_SESSION['REGISTER_ERROR'])){
                echo $_SESSION['REGISTER_ERROR'];
                $_SESSION['REGISTER_ERROR'] = "";
            } ?></p>
        <form action="libs/login/register.php" method="post" id="regForm">

            Username:<br>
            <input name="username" type="text"><br>
            Password:<br>
            <input name="pass1" type="password"><br>
            Password again:<br>
            <input name="pass2" type="password"><br>
            <input type="submit" value="Register">
        </form>

        <?php
    }
    ?>

</div>
<script src="/js/js.js"></script>
</body>

</html>
