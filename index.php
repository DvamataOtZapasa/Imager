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
        <div id="menuContainer">

            <ul id="menuList">
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contacs.php">Contacts</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>

            </div>
            <div id="container">


            <form action="libs/login.php" method="post">
                Username:
                <input name="username" type="text">
                Password:
                <input name="password" type="password">
                <input type="submit">

            </form>

                <?php
                    if(isset($_SESSION['user'])){
                        ?>
                        Lognat s <?= $_SESSION['user']; ?>

                        <form action="libs/logout.php" method="post">
                            <input type="submit" value="logout">
                        </form>
                        <?php
                    }else{
                        ?>
                        <?php
                    }
                ?>

        </div>
    </body>

</html>
