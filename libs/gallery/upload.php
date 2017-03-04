<?php
session_start();
if(isset($_FILES['fileToUpload']['name'])) {
    if (strpos($_FILES['fileToUpload']['type'], "image") !== false && $_FILES['fileToUpload']['size'] <= 20000000) {


        $author = $_SESSION['id'];
        $name = $_POST['name'];

        $imagetype = $_FILES['fileToUpload']['type'];

        if ($imagetype != "tiff") {

            $imagetype = str_replace("image/", "", $imagetype);
            require '../dbConfig.php';
            mysqli_query($con, "INSERT INTO `images`(`name`, `author`) VALUES ('$name','$author')");
            $id = mysqli_query($con, "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$dbName' AND   TABLE_NAME   = 'images'");
            $id = mysqli_fetch_assoc($id);
            $id = $id['AUTO_INCREMENT'] - 1;
            echo "../../images/$id" . "." . $imagetype;
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../../gallery/images/$id");
        }
    }
}
goHome();
?>