<?php
session_start();
require_once "/libs/dbConfig.php";
require_once "/libs/gallery/rating.php";

?>
<html>
<head>
    <title>Imager</title>
    <link type="text/css" rel="stylesheet" href="css/main.css" >
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/js/gallery.js" type="text/javascript"></script>
</head>
<body>
<?php
require_once "/content/menu.php";
rate($con,1,2);
?>
<div id="container" ratingallowed="<?= isLogged()?>">

    <?php if(isLogged()){?>
        <form action="/libs/gallery/upload.php" method="post" enctype="multipart/form-data">
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
        $rating = getRating($con,$image['id']);
        ?> <div class="img">
            <img src="/gallery/images/<?= $image['id'] ?>">
                <p>Name: <?= $image['name']?></p>
                <p class="ratingText">Rating:</p>
                <div class="rating" rating="<?= $rating ?>">
                    <div class="ratingFull" style="width: <?= $rating*20?>%; "><img src="/assets/ratingFull.png"></div>
                    <img class="ratingEmpty" src="/assets/ratingEmpty.png">
                    <form action="/libs/gallery/rate.php" method="post"></form>
                </div>
            <p class="ratingNum""><?= $rating ?></p>
            </div>
        <?php
        ;
    }
    
    ?>

</div>
<script src="/js/js.js"></script>
</body>

</html>
