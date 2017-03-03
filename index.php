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

    <?php if(isLogged()){?>
        <form action="/gallery/upload.php" method="post" enctype="multipart/form-data">
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
        ?> <div class="img">
            <img src="/gallery/images/<?= $image['id'] ?>">
                <p>Name: <?= $image['name']?></p>
                <p>Rating:</p>

                <div class="rating" ">
                    <div class="ratingFull" style="width: <?= getRating($con,$image['id'])*20?>%; "><img src="/assets/ratingFull.png"></div>

                    <img class="ratingEmpty" src="/assets/ratingEmpty.png">
                </div>
            <p class="ratingNum"><?= getRating($con,$image['id'])?></p>
            </div>
        <?php
        ;
    }
    
    ?>

</div>
<script src="/js/js.js"></script>
</body>

</html>
