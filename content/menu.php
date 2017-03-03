<div id="menuContainer">

    <ul id="menuList">
        <li><a href="/">Gallery</a></li>
        <li><a href="/contacs.php">Contacts</a></li>
        <?php if(isLogged()){?>
            <li><a href="/libs/login/logout">Logout</a> </li>
        <?php }else{ ?>
            <li onclick="showLogin()">Login</li>
        <?php }; ?>
    </ul>
<?php
    if (isset($_SESSION['LOGIN_ERROR'])){

    ?> <div id="loginForm" style="display: block !important;"> <?php
    echo "<span id='error'>" . $_SESSION['LOGIN_ERROR'] . "</span>";
    $_SESSION['LOGIN_ERROR'] = null;
    }else{
        ?>  <div id="loginForm"> <?php
    }
    ?>

    <form action="/libs/login/login.php" method="post" >
        Username:<br>
        <input name="username" type="text"><br>
        Password:<br>
        <input name="password" type="password">
        <br>
        <input type="submit" value="Login">
        <a href=""></a>
    </form>
    <a id="regButt" href="/register.php">Register</a>
    </div>
</div>