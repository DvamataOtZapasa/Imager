<div id="menuContainer">

    <ul id="menuList">
        <li><a href="/index.php">Home</a></li>
        <li><a href="/gallery/">Gallery</a></li>
        <li><a href="/contacs.php">Contacts</a></li>
        <?php if(isLogged()){?>
            <li><a href="/libs/login/logout">Logout</a> </li>
        <?php }else{ ?>
            <li onclick="showLogin()">Login</li>
        <?php }; ?>
    </ul>
    <div id="loginForm">
    <form action="/libs/login/login.php" method="post" >
        Username:<br>
        <input name="username" type="text"><br>
        Password:<br>
        <input name="password" type="password">
        <br>
        <input type="submit" value="Login">
        <a href=""></a>
    </form>
    <a href="/register.php">Register</a>
    </div>
</div>