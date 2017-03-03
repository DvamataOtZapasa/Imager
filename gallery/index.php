<?php
session_start();
require_once "../libs/dbConfig.php"

?>
<html>
<head>
    <title>Imager</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css" >
</head>
<body>
<?php
require_once "../content/menu.php"
?>
<div id="container">

    <?php if(isLogged()){?>
        <form action="../libs/gallery/upload.php" method="post" enctype="multipart/form-data">
            Name The Picture:<br>
            <input required type="text" name="name"><br>
            <input required type="file" accept="image/*" name="fileToUpload" cols="7"/>
            <input type="submit" value="upload">
        </form>
    <?php }

    $result = mysqli_query($con,"SELECT * FROM images");
    /*while( $image = mysqli_fetch_assoc( $result)){
        ?> <img src="images/<?= $image['id']?>"> <?php
    }*/
    $resulta = mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach ($resulta as $image){
        ?> <img src="images/<?= $image['id'] ?>">
            <p><?= $image['name']?></p>
        <?php
        echo "<br>";
    }
    
    ?>

</div>
<script src="/js/js.js"></script>
</body>

</html>
