<?php
session_start();
error_reporting(E_ALL);
print_r($_FILES);
if(isset($_FILES['fileToUpload']['name'])){
    if(strpos($_FILES['fileToUpload']['type'], "image") !== false && $_FILES['fileToUpload']['size'] <= 20000000){


        $author = $_SESSION['user'];
        $name = $_POST['name']

        $imagetype = $_FILES['fileToUpload']['type'];

        if($imagetype != "tiff"){

            $imagetype = str_replace("image/", "", $imagetype);
            require '../dbConfig.php';
            mysqli_query($con, "INSERT INTO `images`(`name`, `author`) VALUES ('$author','$name',)");
            $id = mysqli_query($con, "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$dbName' AND   TABLE_NAME   = 'gallery'");
            echo 'INSERT INTO `gallery`(`name`, `author`, `desc`, `rating`, `category`) VALUES ("'.$title.'","'.$author.'","'.$desc.'",0,'.$cat.')';
            $id = mysqli_fetch_assoc($id);
            $id = $id['AUTO_INCREMENT']-1;
            echo "../../images/$id".".".$imagetype;
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../../images/$id".".".$imagetype);
            Resize_Image("$id.$imagetype", $id, 480, 480, "../../images/", "../../images/thumbnails/",$imagetype);
            rename("../../images/$id.$imagetype", "../../images/$id");
            $message = 'Congratulations!  Your file was accepted.';
        }
    }
}
header("Location:/site/gallery")
?>