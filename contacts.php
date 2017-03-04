<?php
session_start();
require_once "/libs/dbConfig.php";
require_once "/libs/gallery/rating.php";

?>
<html>
<head>
    <title>Imager</title>
    <link type="text/css" rel="stylesheet" href="css/main.css" >
</head>
<body>
    <?php
    require_once "/content/menu.php"
    ?>
    <div id="container">
        <div id="owners">
            <h2>This site is made by:</h2>
            <p>Viktor Aleksiev</p>
            <p>Dimitur Meshev</p>
        </div>

    </div>
</body>
<script src="/js/js.js"></script>

</html>
