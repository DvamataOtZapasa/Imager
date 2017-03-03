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

        <form action="libs/login/register.php" method="post">
            Username:
            <input name="username" type="text">
            Password:
            <input name="pass1" type="password">
            Password again:
            <input name="pass2" type="password">
            <input type="submit">
        </form>

        <?php
    }
    ?>

</div>
<script src="/js/js.js"></script>
</body>

</html>
