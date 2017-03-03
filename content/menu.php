<div id="menuContainer">

    <ul id="menuList">
        <li><a href="/index.php">Home</a></li>
        <li><a href="/gallery/">Gallery</a></li>
        <li><a href="/contacs.php">Contacts</a></li>
        <li onclick="showLogin()">Login</li>
    </ul>
    <form action="/libs/login/login.php" method="post" id="loginForm">
        Username:<br>
        <input name="username" type="text"><br>
        Password:<br>
        <input name="password" type="password">
        <br>
        <input type="submit" value="Log in">
        <a href=""></a>
    </form>
</div>