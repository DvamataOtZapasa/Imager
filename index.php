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


            <form action="libs/login/login.php" method="post" id="loginForm">
                Username:<br>
                <input name="username" type="text">
                Password:<br>
                <input name="password" type="password">
                <input type="submit">

            </form>

                <?php
                    if(isset($_SESSION['user'])){
                        ?>
                        Lognat si <?= $_SESSION['user']; ?>

                        <form action="libs/login/logout.php" method="post">
                            <input type="submit" value="logout">
                        </form>
                        <?php
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
