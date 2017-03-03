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
                <li><a href="login.php">login</a></li>
            </ul>

            </div>
            <div id="container">


            <form action="libs/login.php" method="post">
                <input name="username" type="text">
                <input name="password" type="password">
                <input type="submit">

            </form>

                <?php
                    if(isset($_SESSION['user'])){
                        echo "Lognat s " + $_SESSION['user']['user'];
                    }else{

                    }
                ?>

        </div>
    </body>

</html>
